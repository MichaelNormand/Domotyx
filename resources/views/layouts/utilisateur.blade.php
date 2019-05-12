@extends("layouts/app")
@section("contenu")
    <!-- Rendre la sélection de l'utilisateur dynamique, le fix temporaire va d'être de prendre le compte de test en attendant le fix -->
    @if(isset($utilisateur))
        <div class="container os-animation titre-align" data-os-animation="fadeIn" data-os-animation-delay="0.2s">
            <h2 class="titre titre-align">@yield("titre_page", "Informations sur le compte")</h2>
            <span class="line row"></span>
        </div>
        <div class="container">
            <div class="row profil-container">
                <div class="col-lg-4 text-center profil os-animation" data-os-animation="fadeIn"
                     data-os-animation-delay="0.3s">
                    <img src="@if($utilisateur->image_profil != null && file_exists(public_path() . "/" . $utilisateur->image_profil))
                    {{asset($utilisateur->image_profil)}}
                    @else
                    {{asset("medias/commun/images_profil/default_profil.png")}}
                    @endif"
                         class="image-profil rounded shadow p-1 mb-1 bg-white" alt="image de profil">
                    <h3 class="sous-titre">{{$utilisateur->prenom}} {{$utilisateur->nom}}</h3>
                    <h3 class="texte">{{$utilisateur->province}}, {{$utilisateur->pays}}</h3>
                </div>
                <div class="col-lg-8 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                    <div class="row">
                        <h3 class="sous-titre">Identifiant:</h3>
                        <p class="texte profil-info-margin">{{$utilisateur->identifiant}}</p>
                    </div>
                    <div class="row">
                        <h3 class="sous-titre">Courriel:</h3>
                        <p class="texte profil-info-margin">{{$utilisateur->courriel}}</p>
                    </div>
                    <div class="row">
                        <h3 class="sous-titre">Téléphone:</h3>
                        <p class="texte profil-info-margin">@if ($utilisateur->telephone != null) {{$utilisateur->telephone}} @else
                                Non Défini @endif</p>
                    </div>
                    <div class="row">
                        <h3 class="sous-titre">Adresse:</h3>
                        <p class="texte profil-info-margin">{{$utilisateur->adresse}}, {{$utilisateur->ville}}</p>
                    </div>
                    <div class="row">
                        <h3 class="sous-titre">Code postal:</h3>
                        <p class="texte profil-info-margin">{{$utilisateur->code_postal}}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s"/>
        <div class="container">
            @yield("utilisateur_contenu")
        </div>
    @endif
@endsection
@section("script_js")
    @yield("script_js")
@endsection