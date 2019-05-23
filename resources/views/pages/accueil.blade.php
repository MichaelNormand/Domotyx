@include('pages_meta/header')
<body>
<div class="se-pre-con">
    <div class="cssload-aim"></div>
</div>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include("pages_meta/menu")
            </div>

        </div>
    </div>
</header>
<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
                <h1>{{$page->h1}}</h1>
                <p>Projet étudiant - données fictives</p>
                <div class="circle"><a href="#dernieres_produits" data-scroll><i class="fa fa-angle-down"
                                                                                 aria-hidden="true"></i></a></div>
            </div>
        </div>
    </div>
</section>

<section id="dernieres_produits">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
                <h2>Dernières Parutions</h2>
                <span class="line"></span>
                <p>Voici la liste de nos derniers produits étant maintenant disponible à l'achat.</p>
                <!-- TODO: Mettre de vrais produits dans la liste -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.1s">
                <a href="#"><img src="{{asset("medias/commun/w1.jpg")}}" alt=""/></a>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.2s">
                <a href="#"><img src="{{asset("medias/commun/w2.jpg")}}" alt=""/></a>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.3s">
                <a href="#"><img src="{{asset("medias/commun/w3.jpg")}}" alt=""/></a>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.1s">
                <a href="#"><img src="{{asset("medias/commun/w4.jpg")}}" alt=""/></a>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.2s">
                <a href="#"><img src="{{asset("medias/commun/w5.jpg")}}" alt=""/></a>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.3s">
                <a href="#"><img src="{{asset("medias/commun/w6.jpg")}}" alt=""/></a>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.1s">
                <a href="#"><img src="{{asset("medias/commun/w7.jpg")}}" alt=""/></a>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.2s">
                <a href="#"><img src="{{asset("medias/commun/w8.jpg")}}" alt=""/></a>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.3s">
                <a href="#"><img src="{{asset("medias/commun/w9.jpg")}}" alt=""/></a>
            </div>
        </div>
    </div>
</section>

<section id="equipe">
    <!-- TODO: Faire un mécanisme permettant d'automatiser la visualisation de l'équipe -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
                <h2>Notre Équipe</h2>
                <span class="line"></span>
                <p>Pilliers et fondateurs de Domotyx.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-3 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.1s">
                <article>
                    <img src="{{asset("medias/commun/t1.png")}}" alt=""/>
                    <h3>PRÉNOM NOM</h3>
                    <span>Rôle</span>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                </article>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.2s">
                <article>
                    <img src="{{asset("medias/commun/t1.png")}}" alt=""/>
                    <h3>PRÉNOM NOM</h3>
                    <span>Rôle</span>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-dribbble" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                </article>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.3s">
                <article>
                    <img src="{{asset("medias/commun/t1.png")}}" alt=""/>
                    <h3>PRÉNOM NOM</h3>
                    <span>Rôle</span>
                    <a href="#"><i class="fab fa-skype" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                </article>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3 os-animation" data-os-animation="zoomIn"
                 data-os-animation-delay="0.4s">
                <article>
                    <img src="{{asset("medias/commun/t1.png")}}" alt=""/>
                    <h3>PRÉNOM NOM</h3>
                    <span>Rôle</span>
                    <a href="#"><i class="fab fa-skype" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                </article>
            </div>

        </div>
    </div>
    <div class="container">
        {!! $page->contenu !!}
    </div>
</section>
@if(@isset($errors) && $errors->any())
    <div class="alert alert-danger os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@include("flash::message")
<section id="contacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
                <h2>contact</h2>
                <span class="line"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-sm-5 col-md-5 os-animation" data-os-animation="fadeInLeft"
                 data-os-animation-delay="0.1s">
                <p>Où sommes-nous?</p>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d88719.79631464367!2d-72.30445513662029!3d45.98137234210114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc806be970dc879%3A0xcad87c83a23aba7d!2sSainte-Clotilde-de-Horton%2C+QC!5e0!3m2!1sen!2sca!4v1548555355703"
                            width="600" height="450" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-7 col-sm-7 col-md-7 os-animation text-left" data-os-animation="fadeInRight"
                 data-os-animation-delay="0.1s">
                <p>Vous voulez nous contacter? Envoyez-nous un email ici!</p>
                @include("partials/commentaires")
            </div>
        </div>

    </div>
</section>

@include('pages_meta/footer')

</body>
</html>
