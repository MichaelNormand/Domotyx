<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageModificationRequest;
use App\Page;
use App\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Fonction permettant d'afficher la page d'accueil par le biais d'une route.
     */
    public function accueil()
    {
        $page = Page::where("url", "/")->first();
        return View("pages/accueil", ["page" => $page]);
    }

    /**
     * Fonction permettant d'afficher la page des informations à venir par le biais d'une route.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View: Retour de la vue correspondante à la page des informations à venir.
     */
    public function informations()
    {
        return View('pages/informations');
    }

    public function connexion()
    {
        $page_appel = back()->getTargetUrl();
        if ($page_appel != route("pages.connexion") && $page_appel != route("pages.inscription")) {
            session(["page_appel" => $page_appel]);
        }
        return View("pages/connexion");
    }

    public function inscription()
    {
        $pays = Pays::all();
        return View("pages/inscription")->with(["pays" => $pays]);
    }

    public function modification()
    {
        return View("pages/modification_page", ["pages" => Page::orderBy("titre")->get()]);
    }

    public function modifier(PageModificationRequest $request)
    {
        try {
            $page = Page::findOrFail($request->page_id);
            $page->h1 = $request->titre;
            $page->contenu = $request->contenu;
            $page->save();
            flash("Vos modifications ont été sauvegardées!");
            return Redirect::back();
        } catch (\Exception $erreur) {
            flash("Une erreur est survenue, veuillez réessayer plus tard.");
            return Redirect::back();
        }
    }

    public function contenu($page_id)
    {
        $page = Page::findOrFail($page_id);
        return json_encode(["titre" => $page->h1, "contenu" => $page->contenu]);
    }
}
