@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">User Settings</li>
            </ol>
               <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-target"></i> Setup exemptions and SU 
                      
                    </div>
                    

                    <div class="card-body">
                            {!! Form::open(['action' => ['DashboardController@setSpecial'], 'method' => 'POST'])!!}
                            <div class="form-group">
                                    {{Form::label('SU', 'Total MC able to SU')}}
                                    {{Form::text('SU', $su,['class' => 'form-control', 'placeholder' => 'Default: 32 MC in total.'])}}
                                </div>
                                <div class="form-group">
                                        {{Form::label('exemption', 'Exempted MC for graduation')}}
                                        {{Form::text('exemption', $exemption,['class' => 'form-control', 'placeholder' => 'Polytechnic default : 20 MC.'])}}
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