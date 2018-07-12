@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Modules</li>
            </ol>
               <!-- Example DataTables Card-->
               <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Manage Your Modules 
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                                Add Modules
                        </button>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                            <th>Module Code</th>
                                            <th>Year Taken</th>
                                            <th>Sem Taken</th>
                                            <th>Grade</th>
                                            <th>MC Worth</th>
                                            <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                        @if(count($modules) > 0)
                                        @foreach($modules as $module)
                                        <tr>
                                              <td>{{$module->module_code}}</td>
                                        <td>{{$module->year_taken}}</td>
                                        <td>{{$module->sem_taken}}</td>
                                              <td>{{$module->grade}}</td>
                                        <td>{{$module->mc_worth}}</td>
                                        <td> {!! Form::open(['action' => ['ModulesController@destroy', $module->id], 'method' => 'POST']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                          {{Form::submit('delete', ['class' => 'btn btn-danger'])}}{!!Form::close() !!}
                                          {{-- <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button> --}}
                                        </td>
                                            </tr>
                          
                                        @endforeach
                                        @else
                                        @endif
                                        <tfoot>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
            
        </div>

        
        
            <!-- Core plugin JavaScript-->
            <script src="assets/scripts/jquery.easing.min.js"></script>
            <!-- Page level plugin JavaScript-->
            <script src="assets/scripts/jquery.dataTables.js"></script>
            <script src="assets/scripts/dataTables.bootstrap4.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="assets/scripts/sb-admin.min.js"></script>
            <!-- Custom scripts for this page-->
            <script src="assets/scripts/sb-admin-datatables.min.js"></script>
            <script src="assets/scripts/sb-admin-charts.min.js"></script>
</div>

<div aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1" id="create" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title">State the academic period</h4>
              <button type="button" aria-label="Close" class="close" data-dismiss="modal" name="button"><span aria-hidden="true">&times;</span></button>
            
            </div>
            <div class="modal-body">
               
              <div class="">
                {!! Form::open(['action' => 'ModulesController@store', 'method' => 'POST']) !!}
                <div class="row">
                <div class="form-group col-md-6 col-sm-6">
                    {{Form::label('year_taken', 'Year Taken')}} {{Form::select('year', ['2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019'],'null',['class' => 'form-control', 'placeholder' => 'Pick a Year', 'id' => 'year'])}}
                </div>
                <div class="form-group col-md-6 col-sm-6">
                    {{Form::label('sem_taken', 'Semester Taken')}} {{Form::select('semester', ['1' => '1', '2' => '2'],'null',['class' => 'form-control', 'placeholder' => 'Pick a Semester', 'id' => 'semester'])}}
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6 col-sm-6" id="num_modules">
                    {{Form::label('num_of_modules', 'Number of Modules taken')}} {{Form::selectRange('num_mods',1,12 ,'null',['class' => 'form-control', 'placeholder' => 'Select number of modules taken'])}}
                </div>
              </div>
                <div class="row">
                <div class="form-group col-md-12 col-sm-12" id="module_details">
                  {{-- We will populate this with the number of modules selected --}}
                </div>
              </div>
              </div>
              </div>
              
              <div class="modal-footer">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                  {!! Form::close() !!}
              </div>
          </div>
          
          
        </div>
      </div> 


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
@endsection