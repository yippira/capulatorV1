<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="This web app will calculate your CAP and give you a target">
  <meta name="author" content="Pereira Yip And Bryan Wang">
  <title>{{config('app.name', 'Capulator')}}</title>

  {{-- include my own bootstrap and stuff --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">

  {{-- ChartJS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

  {{-- ProgressBar --}}
  <script src="{{ asset("assets/scripts/progressbar.min.js") }}" type="text/javascript"></script>

  {{-- Standard JQuery and Bootstrap for Ajax--}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    @include('inc.userNav') 
    <div class="content-wrapper">
        <div class="container-fluid">
          @include('inc.messages')
    @yield('content')
        </div>
      </div>
      @include('inc.footer')
    @include('inc.logout')
</body>

</html>
