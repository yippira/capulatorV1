@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item"><a href="/notes">Notes</a></li>
        <li class="breadcrumb-item active">View</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
                <h3>{{$note ->title}}</h3>
        </div>
        <div class="card-body">
            <p>{!! $note->body !!}</p>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection