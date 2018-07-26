<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Capulator') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/new/app.js') }}"></script>
    <script src="{{ asset('js/new/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/new/jquery.ui.core.js') }}"></script>
    <script src="{{ asset('js/new/jquery.ui.tabs.js') }}"></script>
    <script src="{{ asset('js/new/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('js/new/jquery.ui.accordion.js') }}"></script>
    <script src="{{ asset('js/new/animations.js') }}"></script>
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Revolution Slider -->
        <link rel="stylesheet" type="text/css" href="assets/rs-plugin/css/layers.css">
        <link rel="stylesheet" type="text/css" href="assets/rs-plugin/css/navigation.css">
        <link rel="stylesheet" type="text/css" href="assets/rs-plugin/css/settings.css">

      {{-- Standard JQuery, PopperJS and Bootstrap for Ajax--}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/structure.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.nav')
        <main>
            @yield('content')
            @include('inc.landingPage_footer')
        </main>
    </div>

    <script src="assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="assets/rs-plugin/js/extensions/revolution.extension.carousel.min.js"></script>


<script>
        var tpj = jQuery;
        var revapi68;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_68_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_68_1");
            } else {
                revapi68 = tpj("#rev_slider_68_1").show().revolution({
                    sliderType: "hero",

                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {},
                    responsiveLevels: [1240, 1024, 778, 480],
                    gridwidth: [1400, 1240, 778, 480],
                    gridheight: [768, 768, 960, 720],
                    lazyType: "none",
                    parallax: {
                        type: "mouse+scroll",
                        origo: "slidercenter",
                        speed: 2000,
                        levels: [1, 2, 3, 20, 25, 30, 35, 40, 45, 50],
                        disable_onmobile: "on"
                    },
                    shadow: 0,
                    spinner: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); /*ready*/
    </script>  
        </script>
        
</body>
</html>
