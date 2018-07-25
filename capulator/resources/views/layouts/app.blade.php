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

    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Revolution Slider -->
        <link rel="stylesheet" type="text/css" href="assets/rs-plugin/css/layers.css">
        <link rel="stylesheet" type="text/css" href="assets/rs-plugin/css/navigation.css">
        <link rel="stylesheet" type="text/css" href="assets/rs-plugin/css/settings.css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/be_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/structure.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.nav')
        <main>
            @yield('content')
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
            var revapi92;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_92_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_92_1");
                } else {
                    revapi92 = tpj("#rev_slider_92_1").show().revolution({
                        sliderType: "hero",
    
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {},
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [500, 450, 400, 350],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "enterpoint",
                            speed: 400,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
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
</body>
</html>
