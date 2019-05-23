<?php
$animationDelay = 0.5;
?>
@extends("layouts/produits")
@section("contenu_page")
    @isset($categories)
        @if($categories->count() > 0)
            <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
                <h3 class="sous-titre">Rechercher par Catégories</h3>
            </div>
            <div class="container container-allign">
                @foreach($categories as $categorie)
                    @if($categorie->image_url != "" and $categorie->image_url != null)
                        <a href="{{route("pages.categorie", [$categorie->id])}}">
                            <div class="col-lg-4 col-sm-12 text-center categorie-produit os-animation" data-os-animation="fadeIn"
                                 data-os-animation-delay="{{$animationDelay += 0.1}}s">
                                <img src="{{asset($categorie->image_url)}}"
                                     class="image-categorie-produit rounded shadow p-1 mb-1 bg-white" alt="categorie_image">
                                <h1 class="titre-categorie">{{html_entity_decode(htmlspecialchars($categorie->nom))}}</h1>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        @else
            <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="2.5s">
                <h3 class="sous-titre">Informations à venir</h3>
                <p>Notre équipe travaille encore sur cette fonctionnalité, veuillez réessayer plus tard.</p>
            </div>
        @endif
    @endisset
@endsection
