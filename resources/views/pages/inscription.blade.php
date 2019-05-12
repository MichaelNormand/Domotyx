@extends("layouts/app")
@section("contenu")
    <div class="container os-animation titre-align" data-os-animation="fadeIn" data-os-animation-delay="0.2s">
        <h2 class="titre titre-align">Inscription</h2>
        <span class="line row"></span>
    </div>
    @include("flash::message")
    @if(isset($errors) && $errors->any())
        <div class="alert alert-danger os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <form enctype="multipart/form-data" method="post" action="{{route("utilisateur.creer")}}">
                {{csrf_field()}}
                <div class="row">
                    <h3 class="sous-titre">Informations de Connexion</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="identifiant"><b>*</b> Identifiant:</label>
                            <input type="text" id="identifiant" name="identifiant" class="form-control"
                                   value="{{old("identifiant")}}" maxlength="100">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="mot_de_passe"><b>*</b> Mot de Passe:</label>
                            <input type="password" id="mot_de_passe" class="form-control" name="mot_de_passe" minlength="6">
                            <p id="mot_de_passe_validation" class="erreur">Faible</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="mot_de_passe_confirmation"><b>*</b> Confirmation:</label>
                            <input type="password" id="mot_de_passe_confirmation" class="form-control"
                                   name="mot_de_passe_confirmation" minlength="6">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3 class="sous-titre">Informations Personnelles</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="image_profil">Image de Profil:</label>
                        <input type="file" class="form-control-file" name="image_profil" id="image_profil">
                        <div class="form-group">
                            <button class="btn btn-outline-secondary" id="ajouter_image">Ajouter une image</button>
                            <p id="image_validation" class="erreur">Aucune image sélectionnée</p>
                        </div>
                        <div class="form-group">
                            <img id="image_selectionnee" class="d-none image-selectionnee" src="#" alt="image_selectionnee">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="prenom"><b>*</b> Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{old("prenom")}}" maxlength="100">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nom"><b>*</b> Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{old("nom")}}" maxlength="100">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email"><b>*</b> Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old("email")}}" maxlength="150">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="telephone">Téléphone:</label>
                            <input type="text" class="form-control" id="telephone" name="telephone"
                                   value="{{old("telephone")}}" maxlength="25">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="adresse"><b>*</b> Adresse:</label>
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                   value="{{old("adresse")}}" maxlength="200">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="ville"><b>*</b> Ville:</label>
                            <input type="text" class="form-control" id="ville" name="ville" value="{{old("ville")}}" maxlength="100">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="code_postal"><b>*</b> Code Postal:</label>
                            <input type="text" class="form-control" id="code_postal" name="code_postal"
                                   value="{{old("code_postal")}}" maxlength="10">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="province"><b>*</b> Province:</label>
                            <input type="text" class="form-control" id="province" name="province"
                                   value="{{old("province")}}" maxlength="100">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            @if(@isset($pays) && $pays->count() > 0)
                                <label for="pays"><b>*</b> Pays:</label>
                                <select class="form-control" id="pays" name="pays">
                                    <option>Sélectionnez un pays...</option>
                                    @foreach($pays as $pays_selectionne)
                                        <option @if($pays_selectionne->nom == old("pays")) selected @endif>{{$pays_selectionne->nom}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group text-center">
                            <button id="soumission" class="btn btn-outline-danger">S'inscrire!</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
@endsection
@section("script_js")
    <script src="{{asset("js/mecanisme_inscription.js")}}"></script>
@endsection