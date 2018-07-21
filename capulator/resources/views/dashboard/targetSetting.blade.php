@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Target Setting</li>
            </ol>
               <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-target"></i> Manage Your Expectations 
                      
                    </div>

                    <div class="card-body">
                            {!! Form::open(['action' => ['DashboardController@setGoal'], 'method' => 'POST'])!!}
                            <div class="form-group">
                                    {{Form::label('cap_goal', 'CAP Goal')}}
                                    {{Form::text('cap_goal', '',['class' => 'form-control', 'placeholder' => 'Eg. 4.75'])}}
                                </div>
                                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                {!!Form::close()!!} 
                     
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

@endsection