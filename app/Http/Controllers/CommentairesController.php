<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\Http\Requests\CommentairesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class CommentairesController extends Controller
{

    public function store( CommentairesRequest $request, $page ) : RedirectResponse {
        $commentaire = new Commentaire( $request->all() );
        $commentaire->date = new \DateTime( "now", new \DateTimeZone("America/New_York") );
        if ( $page == "accueil" ) {
            $commentaire->url = "/";
        } else {
            $commentaire->url = $page;
        }
        $commentaire->save();
        flash("Le commentaire a été ajouté avec succès!")->success();
        return Redirect::back();
    }
}
