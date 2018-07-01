@extends('layouts.dashboard')
@section('content')

<div class="container">
        <h2>Modules</h2>
        <p>Module information are displayed here</p>            
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="col-md-3 col-sm-3">Module Code</th>
              <th class="col-md-2 col-sm-2">Year taken</th>
              <th class="col-md-2 col-sm-2">Sem Taken</th>
              <th class="col-md-2 col-sm-2">Grade</th>
              <th class="col-md-2 col-sm-2">MC Worth</th>
            </tr>
          </thead>
          <tbody>
              @if(count($modules) > 0)
              @foreach($modules as $module)
              <tr>
                    <td>{{$module->module_code}}</td>
              <td>{{$module->year_taken}}</td>
              <td>{{$module->sem_taken}}</td>
                    <td>{{$module->grade}}</td>
              <td>{{$module->mc_worth}}</td>
                  </tr>
              
              @endforeach
              @else
              @endif
           
          </tbody>
        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Add Modules
          </button>
      </div>
      



{!! Form::open(['url' => 'foo/bar']) !!}
    
{!! Form::close() !!}

@endsection