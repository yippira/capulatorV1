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
                     <div aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1" id="create" class="modal fade" role="dialog">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" aria-label="Close" class="close" data-dismiss="modal" name="button">&times;</button>
                                  <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                  <p>Form starts here</p>
                                </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-warning" type="submit" id="add">
                                      Add
                                    </button>
                                  </div>
                              </div>
                            </div>
                          </div> 

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


        {{-- <script type="text/javascript">

            $(document).on('click', '.create-modal',function(){
                $('#create').modal('show');
                $('.form-horizontal').show();
                $('.modal-title').text('Add Post');
            });

        </script> --}}
    </body>
</html>
