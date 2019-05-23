@extends("layouts/app")
@section("contenu")
    <div class="container os-animation titre-align" data-os-animation="fadeIn" data-os-animation-delay="0.2s">
        <h2 class="titre titre-align">@yield("titre_page", "Nos Produits")</h2>
        <span class="line row"></span>
    </div>
    <div class="container">
        <div class="row os-animation overflow" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        @isset($categories)
                            @if($categories->count() > 0)
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie
                                    </button>
                                    <div id="dropdown-recherche-categorie" class="dropdown-menu overflow">
                                        @foreach($categories as $categorie)
                                            <a class='dropdown-item'>{{html_entity_decode(htmlspecialchars($categorie->nom))}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endisset
                        <input id="produit_recherche" type="text" class="form-control"
                               placeholder="Article à rechercher..." autofocus>
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="button">Rechercher</button>
                        </div>
                    </div>
                </div>
                <hr class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s"/>
            </div>
        </div>
        <div>
            @yield("contenu_page")
        </div>
    </div>
@endsection
@section("script_js")
    @yield("script_js")
@endsection
