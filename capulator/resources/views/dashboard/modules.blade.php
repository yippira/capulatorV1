@extends('layouts.dashboard')
@section('content')
<h2>Modules</h2>

{!! Form::open(['url' => 'foo/bar']) !!}
    //
{!! Form::close() !!}
@endsection