<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'Capulator')}}</title>

            <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        {{-- Ajax form add --}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


        <script type="text/javascript">



            $('#num_modules').hide();

            var yearSelected = false;
            var semSelected = false;
            var mod_num = 0;

            $('#year').change(function() {
                
                       
                    yearSelected = true;
                    if(semSelected){
                        $('#num_modules').show();

                    }
                    
                
            });
            
            $('#semester').change(function() {
                
                    semSelected = true;
                    if(yearSelected){
                        $('#num_modules').show();

                    }  
                
            });

            $('#num_modules').change(function(){
                $('select option:selected').each(function(){

                mod_num = $(this).text() + " ";
                });

            $("#module_details").html('');    
            console.log(mod_num);
            $("#module_details").append('<hr>');

            for(var i = 1; i <= mod_num; i++){
                
            //$("#module_details").append('<div class="form-row">');
            $("#module_details").append('<div class="col-md-4"> {{Form::label('mod_code', 'Module Code')}} {{Form::text('mod_code', '',['class' => 'form-control', 'placeholder' => 'Eg. CS1010'])}} </div>');
            //next we set these 2 to hidden form and populate with the year and sem taken above
          //  $("#module_details").append('<div class="col-md-2"> {{Form::label('year_taken', 'Year')}} {{Form::text('year_taken', '2018',['class' => 'form-control', 'placeholder' => 'Eg. 2018'])}} </div>');
         //   $("#module_details").append('<div class="col-md-2"> {{Form::label('sem_taken', 'Semester')}} {{Form::text('sem_taken', '1',['class' => 'form-control', 'placeholder' => 'Eg. 1'])}} </div>');
            $("#module_details").append('<div class="col-md-4"> {{Form::label('grade', 'Grade')}} {{Form::text('grade', '',['class' => 'form-control', 'placeholder' => 'Eg. A'])}} </div>');
            $("#module_details").append('<div class="col-md-4"> {{Form::label('mc_worth', 'MC Worth')}} {{Form::text('mc_worth', '',['class' => 'form-control', 'placeholder' => 'Eg. 4'])}} </div>');
                
            }

            });
            





            // $(document).on('click', '.create-modal',function(){
            //     $('#create').modal('show');
            //     $('.form-horizontal').show();
            //     $('.modal-title').text('Add Post');
            // });

        </script>

        
    </body>
</html>
