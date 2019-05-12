@extends('layouts/utilisateur')
@section("titre_page", "Ajouter un Produit")
@section("utilisateur_contenu")
    <div id="messages">
        <div class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            @include('flash::message')
        </div>
        @if(isset($errors) && $errors->any())
            <div class="alert alert-danger os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @php
                if(isset($erreurs_serveur)){
                    array_push($errors->keys(), $erreurs_serveur);
                } else {
                    $erreurs_serveur = $errors->keys();
                }
            @endphp
        @endif
    </div>
    <p class="texte os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s"><b>*</b> Champs requis</p>
    <form id="formulaire_ajout_item" enctype="multipart/form-data" class="os-animation" method="post"
          action="{{route("utilisateur.soumettre_item")}}" data-os-animation="fadeIn"
          data-os-animation-delay="@if(@isset($errors)) 0.7s @else 0.9s @endif">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="image_produit"><b>*</b> Image: </label>
            <input type="file"
                   class="form-control-file"
                   name="image_produit[]" id="image_produit">
            <small class="form-text text-muted">L'image doit être de format JPEG, JPG, PNG ou SVG.</small>
        </div>
        <div class="form-group">
            <button class="btn btn-outline-secondary" id="ajouter_image">Ajouter une image</button>
            <p id="image_validation" class="erreur">Aucune image sélectionnée</p>
        </div>
        <div class="form-group">
            <label for="titre_produit"><b>*</b> Nom: </label>
            <input type="text"
                   class="form-control @if(@isset($erreurs_serveur)) @if(in_array("nom", $erreurs_serveur)) is-invalid @endif @endif"
                   id="titre_produit" placeholder="Entrez le nom du produit..."
                   name="nom" maxlength="100" value="{{old("nom")}}" autofocus>
            <small class="form-text text-muted">Le nom du produit doit se situer entre 1 et 100 charactères
                inclusivement.
            </small>
        </div>
        <div class="form-group">
            <label for="prix_produit"><b>*</b> Prix: </label>
            <input type="number" step="0.01"
                   class="form-control @if(@isset($erreurs_serveur)) @if(in_array("prix", $erreurs_serveur)) is-invalid @endif @endif"
                   id="prix_produit"
                   placeholder="Entrez le prix du produit..." name="prix" value="{{old("prix")}}">
            <small class="form-text text-muted">Le prix doit se situer entre 0.00$ et 10 000.00$ inclusivement.</small>
        </div>
        @if(@isset($categories))
            <div class="form-group">
                <label for="categories"><b>*</b> Catégories:</label>
                <select class="form-control @if(@isset($erreurs_serveur)) @if(in_array("categories", $erreurs_serveur)) is-invalid @endif @endif"
                        id="categories">
                    <option selected>Sélectionnez une catégorie...</option>
                    @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Vous devez choisir un minimum de une catégorie.</small>
                <button id="boutton_ajout_categorie" class="btn btn-outline-secondary">Ajouter la Catégorie</button>
            </div>
            <div class="form-group">
                <label for="tableau_categories">Catégories sélectionnées:</label>
                @if (old("categories") != null && count(old("categories")) > 0)
                    @if (count(old("categories")) == 1)
                        <p id="message_categorie" class="correct">1 catégorie sélectionnée.</p>
                    @else
                        <p id="message_categorie" class="correct">{{count(old("categories"))}} catégories
                            sélectionnées.</p>
                    @endif
                @else
                    <p id="message_categorie" class="erreur">Aucune catégorie sélectionnée.</p>
                @endif
                <table class="table table-striped table-hover table-bordered" id="tableau_categories">
                    <thead>
                    <tr>
                        <th class="fit" scope="col">#</th>
                        <th class="fit" scope="col">Nom Catégorie</th>
                    </tr>
                    </thead>
                    <tbody id="categories_selectionnees">
                    @if (old("categories") != null)
                        @foreach (old("categories") as $categorie)
                            <tr>
                                <th class='fit' scope='row'>
                                    <button class='btn btn-outline-danger btn-sm supprimer'>Supprimer</button>
                                </th>
                                <td>{{$categorie}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        @endif
        <div class="form-group">
            <label for="description_produit"><b>*</b> Description: </label>
            <textarea
                    class="form-control @if(@isset($erreurs_serveur)) @if(in_array("description", $erreurs_serveur)) is-invalid @endif @endif"
                    id="description_produit" rows="6" name="description"
                    maxlength="2147483647">{{old("description")}}</textarea>
        </div>
        <div class="form-group text-center">
            <button id="boutton_soumission" type="submit" class="btn btn-outline-danger" name="formulaire_ajout">Ajouter
                le Produit!
            </button>
        </div>
    </form>
@endsection
@section("script_js")
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script src="{{asset("js/mecanisme-ajouter-item.js")}}"></script>
@endsection