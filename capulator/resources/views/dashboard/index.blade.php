@extends('layouts.dashboard') 
@section('content')
@php
$earliest_year = date("Y");
$earliest_sem = 1;
@endphp

@foreach($modules->sortBy('year_taken') as $module)

@php

$earliest_year = $module->year_taken;
$earliest_sem = $module->sem_taken;

@endphp
@break

@endforeach

        <!-- Breadcrumbs-->
        
           <div class="pull-right py-2 px-2">
                           <a data-toggle="modal" data-target="#instructionsModal"class="btn-lg text-white btn-primary">Instructions</a>
                        
            </div>
            <ol class="breadcrumb">
    
            <li class="breadcrumb-item">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>

        </ol>


        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white grass-green o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-long-arrow-up"></i>
                        </div>
                        <div class="big mr-5">Current CAP : <span style="font-weight:bold ;font-size: 26px;">{{$current_CAP}}</span></div>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white deep-orange o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-check"></i>
                        </div>
                        <div class="mr-5">MC Taken : {{$mc_taken}}</div>
                    </div>
                 
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white pale-purple o-hidden h-100">
                    <div class="card-body" data-toggle="tooltip" data-placement="bottom" title="Did you know, you can set exemptions?">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-trophy"></i>
                        </div>
                        <div class="mr-5">MC To Graduate : 
                                @php
                                    $mc_to_grad = 160 - $mc_taken - $exemption;
                                    if($mc_to_grad <= 0){
                                        echo '<div class="small"> Congratulations! You have graduated and survived! </div>';
                                    }else{
                                        echo $mc_to_grad;
                                    }
                                    @endphp
                                </div>
                    </div>
                    
                    
                    
                   
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white blood-red o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-bullseye"></i>
                        </div>
                        <div class="mr-5">Average Grade : {{$avg_grade}}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End icon cards here --}}
        {{-- The CAP graph starts here --}}
        <div class="row mb-3">
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-header small">
                        <i class="fa fa-area-chart"></i> CAP Projection 
                        @if(count($modules) <= 0)
                        <span data-toggle="tooltip" data-placement="top" title="Your CAP at every semester will be shown here, add more than one semester of modules to see the graph!" class="small fa-pull-right fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                <i class="fa fa-question fa-stack-1x"></i>
                              </span>
                              @else
                              <span data-toggle="tooltip" data-placement="left" title="Try to estimate your expected results for this semester to see how it'll go" class="small fa-pull-right fa-stack">
                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                    <i class="fa fa-question fa-stack-1x"></i>
                                  </span>
                              @endif
                    </div>

                    <div class="card-body">
                        <canvas id="CAPChart" width="100%" height="30"></canvas>
                    </div>
                    <div class="card-footer small text-muted">
                            
                            @php
                            
                            if(!Empty($module_timestamp) || $module_timestamp != null){
                                $timestamp = "$module_timestamp->updated_at";
                                echo('Last updated on ' . date('d/F/Y \a\t h:i:s A',strtotime($timestamp. '+ 8 hours')));
                            }
                            @endphp
                            <div class="pull-right">
                                    Note: Updated time does not track when modules are deleted!
                            </div>
                            
                    </div>
                </div>
                <div class="">
                        <div class="card mb-3">
                            <div data-toggle="tooltip" data-placement="bottom" title="Add new modules under the modules page!" class="card-header">
                                <i  class="fa fa-table"></i> Current Semester Modules                             <a class="btn-sm btn btn-primary pull-right" href="/modules"><i class="fa fa-plus"></i></a></div>
                                
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
                                                
                
                                                
                                                <a class="btn btn-warning text-white pull-right " data-toggle="modal" data-target="#editModal{{$module->id}}"><i class="fa fa-edit"></i> Edit</a> 
                                                 
                                                <a class="btn btn-danger  text-white pull-left " data-toggle="modal" data-target="#deleteModal{{$module->id}}"><i class="fa fa-trash"></i> Delete</a>  
                 
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
                            <div class="card-footer small text-muted">                            
                                @php
                                            if(!Empty($module_timestamp) || $module_timestamp != null){
                                    if($module_timestamp->created_at > $module_timestamp->updated_at)
                                    {
                                        $timestamp = "$module_timestamp->created_at";
                                        echo('Last updated on ' . date('d/F/Y \at h:i:s A',(strtotime($timestamp . '+ 8 hours'))));
                                        //date('m/d/Y',$module_timestamp->created_at);
                                    }else{
                                        $timestamp = "$module_timestamp->updated_at";
                                        echo('Last updated on ' . date('d/F/Y \a\t h:i:s A',strtotime($timestamp. '+ 8 hours')));
                                    //date('m/d/Y',$module_timestamp->updated_at);
                                    }
                                }
                                    @endphp
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header small">
                        <i class="fa fa-support"></i> CAP Goal <span data-toggle="tooltip" data-placement="left" title="Change your CAP Goal under settings!" class="small fa-pull-right fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                <i class="fa fa-question fa-stack-1x"></i>
                              </span>
                    </div>
                    <div class='mx-auto my-2 col-md-8' id="goalSetting">

                    </div>
                    <div class="card-footer small">
                        @if(($cap_goal - $current_CAP) > 0)
                        You are {{$cap_goal - $current_CAP}} away from your goal!
                        @else
                        You have reached your goal! Keep it up!
                        @endif
                    </div>
                </div>
                <div class="card">
                        <div class="card-header small">
                            <i  data-toggle="tooltip" data-placement="left" title="Useful notes can be displayed here! For example, to take a certain module with a friend! Or reminders, or grade targets." class="fa fa-sticky-note">&nbspNotes</i> 
                            <a class="btn-sm btn btn-primary pull-right" href="/notes/create"><i class="fa fa-plus"></i></a>
                        </div>
                        <div style="padding: 0;" class='pb-3 card-body'>
                                <div class="table-responsive">
                    <table id="dataTable2">
                        <thead>
                            <tr>
                                <th></th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($notes as $note)
                            
                                                              {{-- Delete Note Warning Modal --}}
                                                              <div class="modal fade" id="deleteNoteModal{{$note->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteNoteModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteNoteModalLabel">Confirmation</h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">×</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body"><p>Are you sure you want to delete "{{$note->title}}" ?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                    {!! Form::open(['action' => ['NotesController@destroy', $note->id],'class' => 'pull-right', 'method' =>
                                                                                    'POST']) !!} 
                                                                                    
                                                                                    {{Form::hidden('_method', 'DELETE')}} {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger'] )}}
                                                        
                                                                                    {!!Form::close() !!}
                                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                        <tr>

                        <td>
                            
                            <table class="col-md-12">
                                   
                                <thead>
                                <tr>
                                <th>
                                        <div class="my-2">
                                                <a class="btn-sm btn-danger  text-white pull-left " data-toggle="modal" data-target="#deleteNoteModal{{$note->id}}"><i class="fa fa-times fa-sm"></i></a>  
                                          </div>
                                         
                                        <p class="col-md-12 mx-3">
                                                &nbsp&nbsp&nbsp
                                            {!! $note->title!!}   
                                     
                                            <hr>
                                        </p>
                                 
                                        
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>
                                                
                                       
                                <div class="small">
                                    @php
                                        echo strip_tags($note->body);
                                    @endphp
                                </div>
                            </td>
                            </tr>
                        </tbody>
                            
                </table>
            </td>
        </tr>
            @endforeach  
                        </tbody>                         
        </table>
                </div>
                            {{-- @foreach($cap_array as $cap)
                            {{$cap}}
                            @endforeach --}}
                            {{-- <div class="container">
                            @foreach($test_array as $test)
                            {{$test}}
                            @endforeach
                            </div>
                            <div class="container">
                                @foreach($test_array2 as $test)
                                {{$test}}
                                @endforeach
                            </div> --}}
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>

                         
                        </div>
                        
            </div>
            

        </div>
        
                    {{-- Instructions Modal --}}
                    <div class="modal fade" id="instructionsModal" tabindex="-1" role="dialog" aria-labelledby="instructionsModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="instructionsModalLabel">Welcome to Capulator!</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                </div>
                                <div class="modal-body">                                    
                                    <p>To get started, please add the modules you've taken in order to show your CAP!</p>
                                    <p>Adding modules can be done either from the navigation bar on your left under the modules page, or the plus button below.
                                    <img class="py-2" src="images/modules-button.PNG"><img class="py-2 px-2" src="images/button-plus.PNG">
                                    </p>
                                    <p>Addition settings such as exemptions/non-honours degree can be tweaked under user settings!</p>
                                    <p>CAP Goals can be set under settings as well.</p>
                                    <p>Helpful notes can be added for reminders/module goals.</p>
                                </div>
                                <div class="modal-footer">
                                       
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                
                                </div>
                            </div>
                        </div>
                    </div>

        <!-- Module information for easy access on front page-->

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Made By Pereira Yip & Bryan Wang</small>
            </div>
        </div>
    </footer>

  
    <!-- Core plugin JavaScript-->
    <script src="assets/scripts/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="assets/scripts/jquery.dataTables.js"></script>
    <script src="assets/scripts/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/scripts/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="assets/scripts/sb-admin-datatables.min.js"></script>



    <script>
        // This is to setup tooltips


        var cap_array = {!! json_encode($cap_array) !!};
        
        var ctx = document.getElementById('CAPChart').getContext('2d');

        //This will generate the years and semesters
        var acadYearArray = [];
        var startYear = {{$earliest_year}};
        var startSem = {{$earliest_sem}};
        if(startSem == 1){
        for(var i = 0; i < 4; i ++){
            var start = '';
            startYear = {{$earliest_year}} + i;
            for(var j = 1; j <= 2; j++){
                start = startYear + '/' + (startYear+1) +' Sem '+ j;
                acadYearArray.push(start);
            }
            
        }
    }else{
        acadYearArray.push(startYear + '/' + startSem);
        for(var i = 1; i < 4; i ++){
            var start = '';
            startYear = {{$earliest_year}} + i;
            for(var j = 1; j <= 2; j ++){
                start = startYear + '/' + j;
                acadYearArray.push(start);
            }
        }

    }



//Capulator graph chart
                var chart = new Chart(ctx, {
                    
                    type: 'line',
                
                    // The data for our dataset
                    data: {
                        labels: acadYearArray,
                        datasets: [{
                            label: "Your CAP",
                            backgroundColor: 'rgba(74, 179, 213, 0.3)',
                            borderColor: 'rgb(120, 204, 197)',
                            data: cap_array,
                        }]
                    },
                
                    // Configuration options go here
                    options: {}
                });
    </script>

    <script>
        var bar = new ProgressBar.SemiCircle(goalSetting, {
                  strokeWidth: 6,
                  color: '#FFEA82',
                  trailColor: '#eee',
                  trailWidth: 1,
                  easing: 'easeInOut',
                  duration: 1400,
                  svgStyle: null,
                  text: {
                    value: '',
                    alignToBottom: false
                  },
                  from: {color: '#FFEA82'},
                  to: {color: '#ED6A5A'},
                  // Set default step function for all animate calls
                  step: (state, bar) => {
                    bar.path.setAttribute('stroke', state.color);
                    var value = Math.round(bar.value() *  {{$cap_goal}} * 100) / 100 ;
                    if (value === 0) {
                      bar.setText('');
                    } else {
                      bar.setText(value + "/" + ({{$cap_goal}}).toFixed(2));
                    }
                
                    bar.text.style.color = state.color;
                  }
                });
                bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                bar.text.style.fontSize = '150%';
                
                bar.animate(Math.min({{$current_CAP}}, {{$cap_goal}})/{{$cap_goal}});  // Number from 0.0 to 1.0
    </script>
@endsection