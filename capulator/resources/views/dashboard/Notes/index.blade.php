@extends('layouts.dashboard')
@section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Notes</li>
            </ol>
               <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Manage your notes 
                        <a class="btn btn-primary pull-right" href="/notes/create">
                                Add Note
                        </a>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                                <th>Note Title</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th style="width: 150px;">Setting</th>
                                            </tr>
                                        </thead>
                
                                        @if(count($notes) > 0) @foreach($notes as $note)
                                        <tr>
                                            <td>{{$note->title}}</td>
                                            <td>{{$note->created_at}}</td>
                                            <td>{{$note->updated_at}}</td>
                                            <td> <div class="">
                                                {!! Form::open(['action' => ['NotesController@destroy', $note->id],'class' => '', 'method' => 'POST'])
                                                !!} {{Form::hidden('_method', 'DELETE')}} 
                                                {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'pull-left btn btn-danger'] )}}
                                                {!!Form::close()
                                                !!}  
                
                                                
                                                <a class="btn btn-warning pull-right " data-toggle="modal" data-target="#editModal{{$note->id}}"><i class="fa fa-edit"></i> Edit</a>  
                                                </div>                         
                                            </td>
                                        </tr>
                                          <!-- Edit Modal-->
                                    <div class="modal fade" id="editModal{{$note->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Update details for {{$note->title}}</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                           
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



@endsection