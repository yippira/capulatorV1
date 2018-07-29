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
                        <th>Created</th>
                        <th>Updated</th>
                        <th style="">Options</th>
                    </tr>
                </thead>

                @if(count($notes) > 0) @foreach($notes as $note)
                <tr>
                    <td>{{$note->title}}</td>
                    <td>{{date('d/F/Y \a\t h:i:s A',strtotime($note->created_at. '+ 8 hours'))}}</td>
                    <td>{{date('d/F/Y \a\t h:i:s A',strtotime($note->updated_at. '+ 8 hours'))}}</td>
                    <td>
                        <div class="">
                                                     
                             <a class="btn btn-primary mr-1" href="/notes/{{$note->id}}"><i class="fa fa-eye"></i> View</a>                            
 
                             <a class="mr-1 btn btn-danger text-white" data-toggle="modal" data-target="#deleteNoteModal{{$note->id}}"><i class="fa fa-times fa-sm"></i> Delete</a>  

                            <a class="btn btn-warning mr-1" href="/notes/{{$note->id}}/edit"><i class="fa fa-edit"></i> Edit</a>                            {!!Form::close() !!}

                        </div>
                    </td>
                </tr>

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