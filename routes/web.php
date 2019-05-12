<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

//Route de la page d'accueil
Route::get('/', ["as" => "pages.accueil", "uses" => "PagesController@accueil"]);

//Route de la page d'une page non complétée.
Route::get('informations_a_venir', ['as' => 'pages.informations', 'uses' => 'PagesController@informations']);

//Routes concernant les produits.
Route::get('produits', ['as' => 'pages.produits', 'uses' => 'ProduitsController@index']);
Route::get('produits/categorie/{categorie}', ["as" => "pages.categorie", "uses" => "ProduitsController@categorie"]);
Route::get("produits/modification/{produit_id}", ["as" => "pages.modifier_produit", "uses" => "ProduitsController@modifierProduit"])->middleware("detaillant");
Route::post("produits/modification/{produit_id}", ["as" => "produits.modifier", "uses" => "ProduitsController@modifier"])->middleware("detaillant");
Route::delete("produits/suppression/{produit_id}", ["as" => "produits.supprimer", "uses" => "ProduitsController@supprimer"])->middleware("detaillant");

//Routes concernant les utilisateurs.
Route::get("utilisateur/ajouter_item", ["as" => "utilisateur.ajouter_item", "uses" => "UtilisateurController@ajouterItem"])->middleware("detaillant");
Route::post("utilisateur/ajouter_item", ["as" => "utilisateur.soumettre_item", "uses" => "ProduitsController@soumettreItem"])->middleware("detaillant");
Route::get("utilisateur", ["as" => "pages.utilisateur", "uses" => "UtilisateurController@utilisateur"])->middleware("auth");

//Routes concernant les commentaires.
Route::post("soumission_commentaire/{page}", ["as" => "commentaires.soumettre", "uses" => "CommentairesController@store"]);

//Routes concernant les méthodes de connexion.
Route::get("/connexion", ["as" => "pages.connexion", "uses" => "PagesController@connexion"])->middleware("guest");
Route::post("/connexion", ["as" => "utilisateur.connexion", "uses" => "UtilisateurController@connecter"]);
Route::post("/deconnecter", ["as" => "utilisateur.deconnexion", "uses" => "UtilisateurController@deconnecter"]);

//Routes concernant les méthodes d'inscription.
Route::get("/inscription", ["as" => "pages.inscription", "uses" => "PagesController@inscription"]);
Route::post("/inscription", ["as" => "utilisateur.creer", "uses" => "UtilisateurController@creer"]);
