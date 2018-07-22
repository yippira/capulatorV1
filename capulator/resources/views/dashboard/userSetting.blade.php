@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
                @include('inc.messages')
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
                                {!! Form::open(['action' => ['DashboardController@reset'], 'method' => 'POST'])!!}
                                <div class="form-group">
                                        {{Form::hidden('_method', 'DELETE')}} 
                                        {{Form::label('reset', 'Delete all modules and reset')}}
                                </div>
                                {{Form::submit('RESET', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!} 
                                
                    </div>
                    <div class="card-footer small text-muted"></div>
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