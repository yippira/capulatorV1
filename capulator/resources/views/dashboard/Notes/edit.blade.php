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
            <i class="fa fa-edit"></i> Edit Note
        </div>
        <div class="card-body">
{!! Form::open(['action' => ['NotesController@update', $note->id], 'method' => 'POST'])!!}
<div class="form-group">
    {{Form::label('title', 'Title')}} {{Form::text('title', $note->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
</div>
<div class="form-group">
    {{Form::label('body', 'Body')}} {{Form::textarea('body', $note->body, ['id'=>'article-ckeditor','class' => 'form-control', 'placeholder'=>'Body Text'])}}
</div>
        </div>
        <div class="card-footer">
            
{{Form::hidden('_method', 'PUT')}}

{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    </div>
    

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection