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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    </head>
    <body>
        <div id="app">

            <main>


                
                    <div>
                    @include('inc.userNav') 
                    {{-- might have to make side bar collapsable  --}}
                    <div class="col-md-2 col-sm-2">
                        @include('inc.userSideNav')
                    </div>
                    <div class="col-md-10 col-sm-10">
                    @yield('content')
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
            var code = "";
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

           
            for(var $i = 1; $i <= mod_num; $i++){
                

            // $("#module_details").append('<div class="form-row">');
            // $("#module_details").append('<div class="col-md-4"> {{Form::label('mod_code', 'Module Code')}} {{Form::text('mod_code ' , '',['class' => 'form-control', 'placeholder' => 'Eg. CS1010'])}} </div>');
            
            $("#module_details").append("<div class = 'col-md-4'> <label for='mod_code" + $i + "'>Module Code</label><input class = 'form-control' placeholder = 'Eg. CS1010' name = 'mod_code" + $i + "' type='text' </input></div>");


            //next we set these 2 to hidden form and populate with the year and sem taken above
          //  $("#module_details").append('<div class="col-md-2"> {{Form::label('year_taken', 'Year')}} {{Form::text('year_taken', '2018',['class' => 'form-control', 'placeholder' => 'Eg. 2018'])}} </div>');
         //   $("#module_details").append('<div class="col-md-2"> {{Form::label('sem_taken', 'Semester')}} {{Form::text('sem_taken', '1',['class' => 'form-control', 'placeholder' => 'Eg. 1'])}} </div>');
         $("#module_details").append("<div class = 'col-md-4'> <label for='grade" + $i + "'>Grade</label><input class = 'form-control' placeholder = 'Eg. A' name = 'grade" + $i + "' type='text' </input></div>");
         $("#module_details").append("<div class = 'col-md-4'> <label for='mc_worth" + $i + "'>MC Worth</label><input class = 'form-control' placeholder = 'Eg. 4' name = 'mc_worth" + $i + "' type='text' </input></div>");
        
            }

            });
            





            // $(document).on('click', '.create-modal',function(){
            //     $('#create').modal('show');
            //     $('.form-horizontal').show();
            //     $('.modal-title').text('Add Post');
            // });



        </script>

<script>

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    </body>
</html>
