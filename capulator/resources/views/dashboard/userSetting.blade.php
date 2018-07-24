@extends('layouts.dashboard')
@section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">User Settings</li>
            </ol>
               <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-target"></i> Setup exemptions
                      
                    </div>
                    

                    <div class="card-body">
                            {!! Form::open(['action' => ['DashboardController@setSpecial'], 'method' => 'POST'])!!}
                                <div class="form-group">
                                        {{Form::label('exemption', 'Exempted MC for graduation')}}
                                        {{Form::text('exemption', $exemption,['class' => 'form-control', 'placeholder' => 'Polytechnic default : 20 MC.'])}}
                                    </div>
                                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                {!!Form::close()!!} 
                     
                                <hr>
                                <div class="w-100">
                                <label for="prompt">Remove all your modules</label>
                                </div>
                                <a id="prompt" class="btn btn-danger text-white" data-toggle="modal" data-target="#resetModal"><i class="fa fa-exclamation-triangle"></i> RESET</a>  
                                            
 
                                
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
            </div>

            {{-- Reset Warning Modal --}}
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetModalLabel">Warning this will remove all the modules you've added!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body"><p>Are you sure you want to do this?</p>
                        {!! Form::open(['action' => ['DashboardController@reset'], 'method' => 'POST'])!!}
                        <div class="form-group">
                        {{Form::hidden('_method', 'DELETE')}} 
                        {{Form::submit('YES DO IT', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!} 
                        </div>
                       
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

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

@endsection