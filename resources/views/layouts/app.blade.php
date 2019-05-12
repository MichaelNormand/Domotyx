@include('pages_meta/header')
<body>
<div id="main-container">
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
    @include('flash::message')
    <div id="main_container" class="container">
        @yield('contenu')
    </div>
</div>
@include('pages_meta/footer')
@yield("script_js")
</body>
</html>
