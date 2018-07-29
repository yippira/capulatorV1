
@extends('layouts.dashboard') 
@section('content')
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Modules</li>
            </ol>
               <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Manage Your Modules &nbsp <span   data-toggle="tooltip" data-placement="top" title="The system will take your earliest module taken to be the start your studies, so do key it in accurately for your own convenience!" class="small fa fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                <i class="fa fa-question fa-stack-1x"></i>
                              </span>
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
                                                <th>Year taken</th>
                                                <th>Sem Taken</th>
                                                <th>Grade</th>
                                                <th>MC Worth</th>
                                                <th style="width: 150px;">Setting</th>
                                            </tr>
                                        </thead>
                
                                        @if(count($modules) > 0) @foreach($modules as $module)
                                        <tr>
                                            <td>{{$module->module_code}}</td>
                                            <td>{{$module->year_taken}}</td>
                                            <td>{{$module->sem_taken}}</td>
                                            <td>{{$module->grade}}</td>
                                            <td>{{$module->mc_worth}}</td>
                                            <td> <div class="">
                                                    <a class="btn btn-danger  text-white pull-left " data-toggle="modal" data-target="#deleteModal{{$module->id}}"><i class="fa fa-trash"></i> Delete</a>  

                                                
                                                <a class="btn btn-warning pull-right " data-toggle="modal" data-target="#editModal{{$module->id}}"><i class="fa fa-edit"></i> Edit</a>  
                                                </div>                         
                                            </td>
                                        </tr>
                                           {{-- Delete Module Warning Modal --}}
                                    <div class="modal fade" id="deleteModal{{$module->id}}" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="resetModalLabel">Confirmation</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body"><p>Are you sure you want to delete "{{$module->module_code}}" ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                            {!! Form::open(['action' => ['ModulesController@destroy', $module->id],'class' => '', 'method' => 'POST'])
                                                            !!} {{Form::hidden('_method', 'DELETE')}} 
                                                            {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'pull-left btn btn-danger'] )}}
                                                            {!!Form::close()
                                                            !!} 
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                          <!-- Edit Modal-->
                                    <div class="modal fade" id="editModal{{$module->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Update details for {{$module->module_code}}</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                            {!! Form::open(['action' => ['ModulesController@update',$module->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'PUT')}}
                                            <div class="form-group">
                                                    {{Form::label('grade', 'Grade Achieved')}}
                                                    {{Form::select('grade',['A+' => 'A+', 'A' => 'A', 'A-' => 'A-', 'B+' => 'B+', 'B' => 'B', 'B-' => 'B-', 'C+' => 'C+', 'C' => 'C', 'D+' => 'D+', 'D' => 'D', 'F' => 'F', 'S'=>'S'], $module->grade, ['class' => 'form-control'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('mc_worth', 'MC Worth')}}
                                                    {{Form::text('mc_worth', $module->mc_worth, ['class' => 'form-control', 'placeholder'=>'eg 4'])}}
                                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                
                                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                    {!!Form::close()!!}   
                                    </div>
                                </div>
                            </div>
                        </div>
                
                                        @endforeach @else @endif
                                        <tfoot>
                                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"></div>
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
  
  
  <div aria-labelledby="ModuleModalLabel" aria-hidden="true" tabindex="-1" id="create" class="modal fade" role="dialog">
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
                      {{Form::label('year_taken', 'Year Taken')}} {{Form::selectRange('year',  date('Y', strtotime('- 5 years')),date('Y', strtotime('+ 2 years')),'null',['class' => 'form-control', 'placeholder' => 'Pick a Year', 'id' => 'year'])}}
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
                    <i style="display:none;" id="spinner" class="text-primary fa fa-spinner fa-pulse fa-3x"></i>
                  {{Form::submit('Submit', ['class' => 'btn btn-primary', 'id'=>'submit-btn'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            
            
          </div>
        </div> 
  
  
        <script type="text/javascript">
  
            $('#submit-btn').click(function(){
                $('#spinner').show();
                $('#submit-btn').hide();
            });
  
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
              $("#module_details").html('');
              $('select option:selected').each(function(){
  
              mod_num = $(this).text() + " ";
              });
  
              
          $("#module_details").append('<hr>');
          // var SU_option ="";
          // if({{$SU_value}} > 0){
          //      SU_option = "<option value='S'>S</option>"
          // }else{
          //     SU_option = "";
          // }
          var SU_option = "<option value='S'>S</option>"
          var grade_options = "<option value='A+'>A+</option><option value='A'>A</option><option value='A-'>A-</option><option value='B+'>B+</option><option value='B'>B</option><option value='B-'>B-</option><option value='C+'>C+</option><option value='C'>C</option><option value='D+'>D+</option><option value='D'>D</option><option value='F'>F</option>";
         
          for(var $i = 1; $i <= mod_num; $i++){
              
  
          // $("#module_details").append('<div class="form-row">');
          // $("#module_details").append('<div class="col-md-4"> {{Form::label('mod_code', 'Module Code')}} {{Form::text('mod_code ' , '',['class' => 'form-control', 'placeholder' => 'Eg. CS1010'])}} </div>');
          
          $("#module_details").append("<div class='row'><div class = 'col-md-4'> <label for='mod_code" + $i + "'>Module Code</label><input class = 'form-control' placeholder = 'Eg. CS1010' name = 'mod_code" + $i + "' type='text' </input></div><div class = 'col-md-4'> <label for='grade" + $i + "'>Grade</label><select class = 'form-control' name = 'grade" + $i + "'>" + grade_options + SU_option + "</select></div><div class = 'col-md-4'> <label for='mc_worth" + $i + "'>MC Worth</label><input class = 'form-control' value='4' placeholder = 'Eg. 4' name = 'mc_worth" + $i + "' type='text' </input></div></div>");
          //$("#module_details").append("<div class='row'><div class = 'col-md-4'> <label for='mod_code" + $i + "'>Module Code</label><input class = 'form-control' placeholder = 'Eg. CS1010' name = 'mod_code" + $i + "' type='text' </input></div><div class = 'col-md-4'> <label for='grade" + $i + "'>Grade</label><input class = 'form-control' placeholder = 'Eg. A' name = 'grade" + $i + "' type='text' </input></div><div class = 'col-md-4'> <label for='mc_worth" + $i + "'>MC Worth</label><input class = 'form-control' placeholder = 'Eg. 4' name = 'mc_worth" + $i + "' type='text' </input></div></div>");
  
  
          //next we set these 2 to hidden form and populate with the year and sem taken above
        //  $("#module_details").append('<div class="col-md-2"> {{Form::label('year_taken', 'Year')}} {{Form::text('year_taken', '2018',['class' => 'form-control', 'placeholder' => 'Eg. 2018'])}} </div>');
       //   $("#module_details").append('<div class="col-md-2"> {{Form::label('sem_taken', 'Semester')}} {{Form::text('sem_taken', '1',['class' => 'form-control', 'placeholder' => 'Eg. 1'])}} </div>');
  
      
          }
  
          });
  
      </script>
@endsection
        
          
