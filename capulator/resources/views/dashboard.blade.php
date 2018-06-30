<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'Capulator')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />  
    </head>
    <body>
        <div id="app">

            <main>
        
                <div class="container">
                    <div>
                    @include('inc.userNav')
                    <div class="col-md-3 col-sm-3">
                        @include('inc.userSideNav')
                    </div>
                    <div class="col-md-9 col-sm-9">
                    @yield('content')
                    </div>
                </div>
                </div>
            </main>
        </div>
        <script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
    </body>
</html>
