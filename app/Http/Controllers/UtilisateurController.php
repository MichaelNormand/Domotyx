<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\UtilisateurConnexionRequest;
use App\Http\Requests\UtilisateurInscriptionRequest;
use App\Utilisateur;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Mockery\Exception;

class UtilisateurController extends Controller
{
    /**
     * Fonction permettant de rediriger l'utilisateur vers la page d'ajout d'un item.
     * @param $utilisateur_username: Paramètre contenant le nom de l'utilisateur utilisant la page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View: Retour de la vue de l'ajout de l'item.
     */
    public function ajouterItem() {
        $utilisateur = Auth::user();
        $categories = Categorie::where ( "image_url", "!=", null )->get();
        if ( $utilisateur != null ) {
            return View( "pages/ajouter_item", [ "utilisateur" => $utilisateur, "categories" => $categories ] );
        } else {
            return View( "pages/informations" );
        }
    }

    /**
     * Fonction permettant de retourner la page d'accueil de l'onglet "Mon Compte"
     * @param $utilisateur_username: Paramètre contenant le nom de l'utilisateur utilisant la page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View: Retour de la vue de la page d'accueil.
     */
    public function utilisateur() {
        $utilisateur = Auth::user();
        $categories = Categorie::where( "image_url", "!=", null )->get();
        if ( $utilisateur != null ) {
            return View( "layouts/utilisateur", [ "utilisateur" => $utilisateur, "categories" => $categories ] );
        } else {
            return View( "pages/informations" );
        }
    }

    public function connecter( UtilisateurConnexionRequest $request ) {
        $authentification_reussi = Auth::attempt(["identifiant" => $request->identifiant, "password" => $request->mot_de_passe, "est_actif" => 1]);
        if ( $authentification_reussi ){
            return Redirect::to(session("page_appel"));
        } else {
            $request->flashExcept('password');
            flash("L'identifiant ou le mot de passe est incorrect.")->error();
            return Redirect::back();
        }
    }

    public function deconnecter() {
        Auth::logout();
        return Redirect::back();
    }

    public function creer(UtilisateurInscriptionRequest $request) {
        try{
            $erreur_image = false;
            $utilisateur = new Utilisateur($request->all());
            $utilisateur->courriel = $request->email;
            $utilisateur->mot_de_passe = Hash::make($utilisateur->mot_de_passe);
            $utilisateur->prenom = ucfirst(strtolower($utilisateur->prenom));
            $utilisateur->nom = ucfirst(strtolower($utilisateur->nom));
            $utilisateur->code_postal = strtoupper($utilisateur->code_postal);
            $utilisateur->province = ucfirst(strtolower($utilisateur->province));
            if (preg_match_all("/[^\s-]+[-]*/", $utilisateur->ville, $matchs)) {
                $ville = "";
                foreach ($matchs[0] as $match) {
                    if ($match != "de") {
                        $ville .= ucfirst(strtolower($match)) . " ";
                    } else {
                        $ville .= "de ";
                    }
                }
                $utilisateur->ville = $ville;
            }
            if (preg_match_all("/[^\s-]+[-]*/", $utilisateur->adresse, $matchs)) {
                $adresse = "";
                foreach ($matchs[0] as $match) {
                    if ($match != "de") {
                        $adresse .= ucfirst(strtolower($match)) . " ";
                    } else {
                        $adresse .= "de ";
                    }
                }
                $utilisateur->adresse = $adresse;
            }

            if (preg_match_all("/[a-zA-Z0-9]+/", $utilisateur->code_postal, $matchs) && count($matchs[0]) == 1) {
                $utilisateur->code_postal = substr($utilisateur->code_postal, 0, strlen($utilisateur->code_postal) / 2) . " " . substr($utilisateur->code_postal, strlen($utilisateur->code_postal) / 2, strlen($utilisateur->code_postal));
            }
            if ($request->telephone != null) {
                if(  preg_match( '/^[\D]*(\d*)[\D]*(\d{3})[\D]*(\d{3})[\D]*(\d{4})[\D]*$/', $request->telephone,  $matches ) )
                {
                    if ($matches[1] != "") {
                        $utilisateur->telephone = "+" . $matches[1] . "(" . $matches[2] . ") " . $matches[3] . "-" . $matches[4];
                    } else {
                        $utilisateur->telephone = "(" . $matches[2] . ") " . $matches[3] . "-" . $matches[4];
                    }
                } else {
                    $utilisateur->telephone = null;
                }
            }
            if ($request->image_profil != null){
                try{
                    $nom_fichier = pathinfo($request->file("image_profil")->getClientOriginalName(), PATHINFO_FILENAME) . "_" . DateTime::createFromFormat('U.u', microtime(TRUE))->format('YmdHisu') . "." . pathinfo($request->file("image_profil")->getClientOriginalName(), PATHINFO_EXTENSION);
                    $utilisateur->image_profil = "medias/commun/" . $request->file("image_profil")->storeAs("images_profil", $nom_fichier, "images");
                } catch (\Exception $e) {
                    $erreur_image = true;
                }
            }
            $utilisateur->save();
            if ($erreur_image) {
                flash("Votre inscription a été complètée avec succès, mais votre image de profil n'a pas été téléversée.")->success();
            } else {
                flash("Votre inscription a été complètée avec succès!")->success();
            }
            return Redirect::back();
        } catch (\Exception $erreurs){
            flash("Une erreur est survenue. Veuillez réassayer plus tard.")->error();
            return Redirect::back();
        }
    }
}
