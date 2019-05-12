<?php

namespace App\Http\Controllers;

use App\Pays;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Fonction permettant d'afficher la page d'accueil par le biais d'une route.
     */
    public function accueil() {
        return View( "pages/accueil" );
    }

    /**
     * Fonction permettant d'afficher la page des informations à venir par le biais d'une route.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View: Retour de la vue correspondante à la page des informations à venir.
     */
    public function informations() {
        return View( 'pages/informations' );
    }

    public function connexion() {
        $page_appel = back()->getTargetUrl();
        if ($page_appel != route("pages.connexion") && $page_appel != route("pages.inscription")){
            session(["page_appel" => $page_appel]);
        }
        return View("pages/connexion");
    }

    public function inscription() {
        $pays = Pays::all();
        return View("pages/inscription")->with(["pays" => $pays]);
    }
}
