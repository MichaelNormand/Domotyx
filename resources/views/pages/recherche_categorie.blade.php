<?php
$animation_delay = 2.5;
?>

@extends("layouts/produits")
@if(@isset($categorie_titre))
@section("titre_page"){{$categorie_titre}}@endsection
@else
    @section("titre_page", "Liste des Produits de la Catégorie")
@endif

@section("contenu_page")
    <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="2.5s">
        <h3 class="sous-titre">Liste des Produits:</h3>
    </div>
    <div class="container container-allign">
        @if(@isset($produits) && @isset($categories))
            @if($produits->count() > 0)
                @foreach($produits as $produit)
                    @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->est_administrateur)
                        <div class="col-lg-4 col-sm-12 text-center categorie-produit-container os-animation"
                             data-os-animation="fadeIn"
                             data-os-animation-delay="{{$animation_delay += 0.1}}s">
                            <div class="container">
                                <img src="{{asset($produit->image_url)}}"
                                     class="image-categorie-produit rounded shadow p-1 mb-1 bg-white"
                                     alt="produit_image">
                                <div class="middle row">
                                    <div class="col-4">
                                        <a href="#"><i class="fas fa-eye"></i></a>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{route("pages.modifier_produit", ["produit_id" => $produit->id])}}"><i
                                                    class="fas fa-edit"></i></a>
                                    </div>
                                    <div class="col-4">
                                        <form method="post" action="{{route("produits.supprimer", ["produit_id" => $produit->id])}}">
                                            @csrf
                                            @method("DELETE")
                                            <a><i class="fas fa-trash-alt"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <h1 class="titre-categorie">{{html_entity_decode(htmlspecialchars($produit->nom))}}</h1>
                        </div>

                    @else
                        <a href="#">
                            <div class="col-lg-4 col-sm-12 text-center categorie-produit os-animation"
                                 data-os-animation="fadeIn"
                                 data-os-animation-delay="{{$animation_delay += 0.1}}s">
                                <img src="{{asset($produit->image_url)}}"
                                     class="image-categorie-produit rounded shadow p-1 mb-1 bg-white"
                                     alt="produit_image">
                                <h1 class="titre-categorie">{{html_entity_decode(htmlspecialchars($produit->nom))}}</h1>
                            </div>
                        </a>
                    @endif
                @endforeach
            @else
                <p class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="2.6s">Il n'y a actuellement
                    pas de produits de liés à cette catégorie, veuillez réessayer plus tard...</p>
            @endif
        @endif

    </div>
@endsection
@section("script_js")
    <script src="{{asset("js/mecanisme-suppression-produit.js")}}"></script>
@endsection
