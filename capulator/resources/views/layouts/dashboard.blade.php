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

{{-- PopperJS --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> --}}
  {{-- ChartJS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

  {{-- ProgressBar --}}
  <script src="{{ asset("assets/scripts/progressbar.min.js") }}" type="text/javascript"></script>

  {{-- Standard JQuery, PopperJS and Bootstrap for Ajax--}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  
</head>

<body class="fixed-nav sticky-footer dark-navyblue" id="page-top">
    @include('inc.userNav') 
    <div class="content-wrapper">
        <div class="container-fluid">
          @include('inc.messages')
    @yield('content')
        </div>
      </div>
      @include('inc.scroll_to_top')
      @include('inc.footer')
    @include('inc.logout')
</body>
<script>
          $(function () {
             $('[data-toggle="tooltip"]').tooltip()
        })
        
  </script>

</html>
