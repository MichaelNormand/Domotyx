@extends("layouts/app")
@section("contenu")
    <div class="container os-animation titre-align animated fadeIn" data-os-animation="fadeIn" data-os-animation-delay="0.2s">
        <h2 class="titre titre-align">Erreur 403</h2>
        <span class="line row"></span>
    </div>
    <div class="text-center">
        <img src="{{asset("medias/commun/erreur_image.jpg")}}" class="image-erreur" alt="erreur">
    </div>
    <p class="text-center">Vous n'avez pas accès à cette page. Contactez l'administrateur de la plateforme pour obtenir plus d'informations.</p>
    <div class="row">
    </div>
    <p class="text-center">
        @php
            $menu = \App\Menu::orderBy("ordre")->get();
            foreach ($menu as $page) {
                echo "<a href='" . route($page->layout) . "'>$page->titre</a> | ";
            }
        @endphp
        <a href="{{route("pages.produits")}}">Produits</a> |
        <a href="{{route("pages.utilisateur")}}">Mon Compte</a>
    </p>
@endsection