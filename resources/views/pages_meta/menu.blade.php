@php
    $categories = \App\Categorie::orderBy("nom")->get();
    $menu = DB::select("SELECT id, titre, layout, ordre, parent_id, a_enfants(menu.id) AS est_parent FROM menu ORDER BY ordre");
    $url = "";
    $parent = "";
    $est_enfant = false;
@endphp
<div class="logo"><a href="{{route("pages.accueil")}}"><img src="{{asset("medias/commun/logo.svg")}}" alt="logo"/></a>
</div>
<nav class="nav-collapse">
    <ul>
        @php

            use Illuminate\Support\Facades\Auth;$derniere_ordre = 0;
            if (isset($_SERVER["HTTPS"])) {
                $url .= "https://";
            } else {
                $url .= "http://";
            }
            $url .= $_SERVER["HTTP_HOST"];
            if ($_SERVER["REQUEST_URI"] != "/") {
                $url .= $_SERVER["REQUEST_URI"];
            }
            $ordre_enfant = 0;
            foreach ($menu as $page){
            $classe = "menu-item";
            $url = route($page->layout);
            $titre = $page->titre;
                if ($page->est_parent) {
                    if ($ordre_enfant != 0) {
                        echo "</div></li>";
                    }
                    $ordre_enfant = $page->ordre;
                }
                if ($page->parent_id == null && !$page->est_parent) {
                    $est_enfant = false;
                    echo "<li class='$classe'><a href='$url'>$titre</a></li>";
                } else if ($page->parent_id == null && $page->est_parent) {
                    $est_enfant = false;
                    echo "<li class='$classe' value='$url'><a href='' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>$titre</a><div class='dropdown-menu'>";
                } else {
                    $est_enfant = true;
                    echo "<a href='$url' class='dropdown-item'>$titre</a>";
                }
            }
            if ($est_enfant){
                echo "</div></li>";
            }
        @endphp
        <li class="menu-item" value="{{route("pages.produits")}}"><a href="" class="dropdown-toggle"
                                                                     data-toggle='dropdown' aria-expanded='false'>Produits</a>
            <div class='dropdown-menu'>
                @foreach($categories as $categorie)
                    @if ($categorie->image_url != null)
                        <a href="{{route("pages.categorie", ["categorie" => $categorie->id])}}"
                           class="dropdown-item">{{$categorie->nom}}</a>
                    @endif
                @endforeach
            </div>
        </li>
        <li class="menu-item" value="{{route("pages.utilisateur")}}"><a href="" class="dropdown-toggle"
                                                                        data-toggle='dropdown' aria-expanded='false'>Mon
                Compte</a>
            <div class='dropdown-menu'>
                @if (Auth::check())
                    @can("gestion", Auth::user())
                        <a href="{{route("utilisateur.ajouter_item")}}"
                           class="dropdown-item">Ajouter un produit</a>
                        <a href="{{route("pages.modification")}}" class="dropdown-item">Modification des pages</a>
                    @endcan
                    <form id="form_deconnexion" method="post"
                          action="{{route("utilisateur.deconnexion")}}">{{csrf_field()}}<a id="deconnexion" href=""
                                                                                           class="dropdown-item">Se
                            Déconnecter</a></form>
                @else
                    <a href="{{route("pages.connexion")}}" class="dropdown-item">Se Connecter</a>
                @endif
            </div>
        </li>
    </ul>
</nav>
