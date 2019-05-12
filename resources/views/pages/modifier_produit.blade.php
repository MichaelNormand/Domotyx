@extends("layouts/app")
@section("contenu")
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
        @endif
    </div>
    <div class="container os-animation titre-align" data-os-animation="fadeIn" data-os-animation-delay="0.2s">
        <h2 class="titre titre-align">Modification de {{$produit->nom}}</h2>
        <span class="line row"></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-1 col-lg-1"></div>
            <div class="col-10 col-lg-10">
                <form enctype="multipart/form-data" method="post"
                      action="{{route("produits.modifier", ["produit_id" => $produit->id])}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col"></div>
                        <div class="col os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                            <div class="form-group suppression-marge-bas">
                                <label>Image:</label>
                            </div>
                            <div class="form-group">
                                <img class="image-categorie-produit image-modification rounded shadow p-1 mb-1 bg-white"
                                     src="{{asset($produit->image_url)}}" id="image_produit" alt="image_produit">
                                <p class="text-center"><a class="a_style" id="modifierImage">Modifier</a> | <a
                                            class="a_style" id="supprimerImage" href="{{asset("medias/commun/images_produits/sans-photo.svg")}}">Enlever</a></p>
                                <input type="file" class="d-none" id="image_produit_input" value="" name="image_produit">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group os-animation" data-os-animation="fadeIn"
                                 data-os-animation-delay="0.4s">
                                <label for="nom"><b>*</b> Nom:</label>
                                <input type="text" class="form-control" id="nom" name="nom"
                                       value="@if(old("nom")){{old("nom")}}@else{{$produit->nom}}@endif">
                            </div>
                            <div class="form-group os-animation" data-os-animation="fadeIn"
                                 data-os-animation-delay="0.5s">
                                <label for="prix"><b>*</b> Prix:</label>
                                <input type="number" step="0.01" class="form-control" id="prix" name="prix"
                                       value="{{$produit->prix}}">
                            </div>
                        </div>
                        <div class="col os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.6s">
                            <label for="description"><b>*</b> Description:</label>
                            <textarea id="description" name="description"
                                      class="form-control form-description">@if(old("description")){{old("description")}}@else{{$produit->description}}@endif</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check os-animation" data-os-animation="fadeIn"
                                 data-os-animation-delay="0.7s">
                                <input type="checkbox" class="form-check-input" value="" id="rabais_checkbox"
                                       name="afficherRabais"
                                       @if($produit->rabais != null) checked @endif/>
                                <label for="rabais_checkbox" class="form-check-label">Afficher un Rabais</label>
                            </div>
                            <div id="rabaisGroupe"
                                 class="form-group @if($produit->rabais != null || (old("afficherRabais"))) d-block @else d-none @endif os-animation"
                                 data-os-animation="fadeIn"
                                 @if($produit->rabais != null || (old("afficherRabais")))data-os-animation-delay="0.8s" @endif>
                                <label for="rabais">Rabais:</label>
                                <input type="number" step="0.01" class="form-control" id="rabais" name="rabais" value="{{$produit->rabais}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check os-animation" data-os-animation="fadeIn"
                                 data-os-animation-delay="0.9s">
                                <input type="checkbox" class="form-check-input" value="" id="actif" name="actif"
                                       @if($produit->actif) checked @endif/>
                                <label for="actif" class="form-check-label">Actif</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-outline-danger os-animation" data-os-animation="fadeIn" data-os-animation-delay="1.0s">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-1 col-lg-1"></div>
        </div>
    </div>
@endsection
@section("script_js")
    <script src="{{asset("js/mecanisme-modification-produit.js")}}"></script>
@endsection
