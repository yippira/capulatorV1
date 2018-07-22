@extends('layouts.dashboard') 
@section('content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-long-arrow-up"></i>
                        </div>
                        <div class="mr-5">Current CAP : {{$current_CAP}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-check"></i>
                        </div>
                        <div class="mr-5">MC Taken : {{$mc_taken}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-trophy"></i>
                        </div>
                        <div class="mr-5">MC To Graduation : {{160 - $mc_taken - $exemption}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-bullseye"></i>
                        </div>
                        <div class="mr-5">Average Grade : {{$avg_grade}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
                </div>
            </div>
        </div>
        {{-- The CAP graph goes here --}}
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-area-chart"></i> CAP Projection </div>
                    <div class="card-body">
                        <canvas id="CAPChart" width="100%" height="30"></canvas>
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
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-support"></i> CAP Goal
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
                        <div class="card-header">
                            <i class="fa fa-support"></i> Testing data
                        </div>
                        <div class='mx-auto my-2 col-md-8' id="">
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

        <!-- Module information for easy access on front page-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Current Semester Modules</div>
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
                                {!! Form::open(['action' => ['ModulesController@destroy', $module->id],'class' => '', 'method' => 'POST'])
                                !!} {{Form::hidden('_method', 'DELETE')}} 
                                {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'pull-left btn btn-danger'] )}}
                                {!!Form::close()
                                !!}  

                                
                                <a class="btn btn-warning pull-right " data-toggle="modal" data-target="#editModal{{$module->id}}"><i class="fa fa-edit"></i> Edit</a>  
                                </div>                         
                            </td>
                        </tr>
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
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Made By Pereira Yip & Bryan Wang</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" style="display:block;" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
    
  
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
        //think about what to show if you have no cap.
        
        var cap_array = {!! json_encode($cap_array) !!};
        
        var ctx = document.getElementById('CAPChart').getContext('2d');
        var acadYearArray = [];
        var startYear = {{$earliest_year}};
        var startSem = {{$earliest_sem}};
        if(startSem == 1){
        for(var i = 0; i < 4; i ++){
            var start = '';
            startYear = {{$earliest_year}} + i;
            for(var j = 1; j <= 2; j++){
                start = startYear + '/' + j;
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

                var chart = new Chart(ctx, {
                    // The type of chart we want to create
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