@extends("layouts/app")
@section("contenu")
    <div class="container os-animation titre-align" data-os-animation="fadeIn" data-os-animation-delay="0.2s">
        <h2 class="titre titre-align">Modification des Pages</h2>
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
    <form method="post" action="{{route("pages.modifier")}}">
        @csrf
        <label for="page">Page:</label>
        <select id="page" name="page_id" class="form-control">
            <option>Sélectionnez une page...</option>
            @foreach($pages as $page)
                <option value="{{$page->id}}">{{$page->titre}}</option>
            @endforeach
        </select>
        <label for="titre_page">Titre Principal:</label>
        <input type="text" class="form-control" id="titre_page" name="titre" maxlength="100">
        <div id="editeur">
            <editeur id="contenu"></editeur>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group text-center">
                    <button id="bouton_page" type="submit" class="btn btn-outline-danger">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>

@endsection
@section("script_js")
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=rglflktwuvs6jrgsj0r0xy00086p7kyeqmadjj9qek28grx7"></script>
    <script>tinymce.init({selector: 'editeur'});</script>
    <script src="{{asset("js/mecanisme-page.js")}}"></script>
@endsection
