@extends("layouts/app")
@section("contenu")
    <div class="container os-animation titre-align" data-os-animation="fadeIn" data-os-animation-delay="0.2s">
        <h2 class="titre titre-align">Connexion</h2>
        <span class="line row"></span>
    </div>
    <div class="row text-center">
        <div class="col">
            <p>Vous n'avez pas de compte chez nous? <a href="{{route("pages.inscription")}}">Créez vous un compte</a>
                maintenant!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            @include("flash::message")
            @if(isset($errors) && $errors->any())
                <div class="alert alert-danger os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{route("utilisateur.connexion")}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="identifiant">Identifiant:</label>
                    <input type="text" id="identifiant" class="form-control" name="identifiant" maxlength="100" value="{{old("identifiant")}}">
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <input type="password" id="mot_de_passe" class="form-control" name="mot_de_passe">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rester_connecte">
                    <label for="rester_connecte">Rester connecté</label>
                </div>
                <div class="form-group text-center">
                    <button id='connexion' type="submit" class="btn btn-outline-danger">Se Connecter</button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
@endsection