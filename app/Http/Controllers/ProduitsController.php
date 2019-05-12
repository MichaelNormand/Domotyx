<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\CategorieProduit;
use App\Http\Requests\ModificationProduitRequest;
use App\Http\Requests\ProduitRequest;
use App\Produit;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\ImageManagerStatic as Image;
use \Illuminate\Support\Facades\File as File;

class ProduitsController extends Controller
{
    /**
     * Fonction permettant de délivrer la page d'accueil propre aux produits.
     * @return View Retour de la vue de la page d'accueil de la page des produits.
     */
    public function index(): View
    {
        $categories = Categorie::orderBy("nom")->get();
        return View("pages/accueil_produits", ["categories" => $categories]);
    }

    /**
     * Fonction permettant de délivrer une page dynamique des produits d'une catégorie.
     * @return View Retour de la vue propre aux produits des catégories.
     */
    public function categorie($categorie): View
    {
        $categories = Categorie::orderBy("nom")->get();
        $categorie_bd = Categorie::findOrFail(( int )$categorie);
        return View("pages/recherche_categorie", [
            "categories" => $categories,
            "produits" => $categorie_bd->produits()->where("produits.actif", "=", 1)->orderBy("nom")->get(),
            "categorie_titre" => Categorie::find(( int )$categorie)->nom]);
    }

    /**
     * Méthode permettant d'enregistrer un produit dans la base de données.
     * @param ProduitRequest $request : Requête contenant les règles de validation sur la base de données.
     * @return RedirectResponse: Redirection selon le succès de l'ajout de l'item.
     */
    public function soumettreItem(ProduitRequest $request): RedirectResponse
    {
        try {
            $categories = Categorie::where("image_url", "!=", null)->get();
            $selected_categories = $request->get("categories");
            $categories_id = [];
            foreach ($categories as $categorie) {
                foreach ($selected_categories as $selected_categorie) {
                    if ($selected_categorie == $categorie->nom && !in_array($categorie->id, $categories_id)) {
                        array_push($categories_id, $categorie->id);
                    }
                }
            }
            $images = $request->file("image_produit");
            $path = [];
            $i = 0;
            foreach ($images as $image) {
                $i++;
                $height = getimagesize($image)[1];
                $proportions = $height / 170;
                $width = floor(getimagesize($image)[0] / $proportions);
                $nom_fichier = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . "_" . DateTime::createFromFormat('U.u', microtime(TRUE))->format('YmdHisu') . "_" . $i . "." . pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $path_fichier = public_path("medias/commun/images_produits/") . $nom_fichier;
                Image::make($image)->resize($width, 170)->save($path_fichier);
                array_push($path, "medias/commun/images_produits/" . $nom_fichier);
            }
            $produit = new Produit($request->all());
            $produit->actif = true;
            $produit->image_url = $path[0];
            $produit->utilisateur_id = Auth::user()->id;
            $produit->save();
            $produit_id = $produit->id;
            $categorie_produit = null;
            foreach ($categories_id as $categorie_id) {
                $categorie_produit = new CategorieProduit();
                $categorie_produit->categorie_id = $categorie_id;
                $categorie_produit->produit_id = $produit_id;
                $categorie_produit->save();
            }
            flash("Le produit a été ajouté avec succès!")->success();
            return Redirect::back();
        } catch (\Exception $e) {
            flash("Une erreur est survenue. Veuillez réassayer plus tard.")->error();
            return Redirect::back();
        }
    }

    public function modifierProduit($produit_id)
    {
        $produit = Produit::findOrFail($produit_id);
        return View("pages/modifier_produit", ["produit" => $produit]);
    }

    public function modifier($produit_id, ModificationProduitRequest $request)
    {
        try {
            $produit = Produit::findOrFail($produit_id);
            $produit->nom = $request->nom;
            $produit->description = $request->description;
            $image = $request->file("image_produit");
            if (array_key_exists("afficherRabais", $request->all()) && $request->rabais) {
                $produit->rabais = $request->rabais;
            } else {
                $produit->prix = $request->prix;
                $produit->rabais = null;
            }
            if (!array_key_exists("actif", $request->all())) {
                $produit->actif = false;
            } else {
                $produit->actif = true;
            }

            if (array_key_exists("image_ref", $request->all())) {
                if ($produit->image_url != "medias/commun/images_produits/sans-photo.svg"){
                    File::delete(public_path($produit->image_url));
                }
                $produit->image_url = "medias/commun/images_produits/sans-photo.svg";
            } else if (!is_null($image)) {
                if ($produit->image_url != "medias/commun/images_produits/sans-photo.svg"){
                    File::delete(public_path($produit->image_url));
                }
                $height = getimagesize($image)[1];
                $proportions = $height / 170;
                $width = floor(getimagesize($image)[0] / $proportions);
                $nom_fichier = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . "_" . DateTime::createFromFormat('U.u', microtime(TRUE))->format('YmdHisu') . "." . pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $path_fichier = public_path("medias/commun/images_produits/") . $nom_fichier;
                Image::make($image)->resize($width, 170)->save($path_fichier);
                $produit->image_url = "medias/commun/images_produits/" . $nom_fichier;
            }

            $produit->save();
            flash("La modification du produit a été effectuée.")->success();
        } catch (\Exception $e) {
            flash("Une erreur est survenue, veuillez réessayer plus tard.")->error();
        }
        return Redirect::back();
    }
}
