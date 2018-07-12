@extends('layouts.dashboard') 
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
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
                        <div class="mr-5">MC To Graduation : {{160 - $mc_taken}}</div>
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
        <!-- Area Chart Example-->
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-area-chart"></i> CAP Projection </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="30"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-support"></i> CAP Goal
                    </div>
                    <div class='mx-auto my-2 col-md-8' id="goalSetting">
        
                        </div>
                        <div class="card-footer">
                            You are {{5 - $current_CAP}} away from your goal!
                        </div>
                    </div>
            </div>
        </div>
        
                <!-- Example DataTables Card-->
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
            <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </div>
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
                    var value = Math.round(bar.value() * 500)/100;
                    if (value === 0) {
                      bar.setText('');
                    } else {
                      bar.setText(value + "/5.00");
                    }
                
                    bar.text.style.color = state.color;
                  }
                });
                bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                bar.text.style.fontSize = '2rem';
                
                bar.animate({{$current_CAP}}/5);  // Number from 0.0 to 1.0
                    </script>
                </div>
        </div>
@endsection