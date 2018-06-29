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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Capulator') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- <script src="js/jquery-2.1.4.min.js"></script>
    <script src={{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.video.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.actions.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.migration.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}></script>
    <script src={{ asset('rs-plugin/js/extensions/revolution.extension.carousel.min.js') }}></script> --}}

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
            var revapi42;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_42_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_42_1");
                } else {
                    revapi42 = tpj("#rev_slider_42_1").show().revolution({
                        sliderType: "hero",
    
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {},
                        viewPort: {
                            enable: true,
                            outof: "pause",
                            visible_area: "80%"
                        },
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
