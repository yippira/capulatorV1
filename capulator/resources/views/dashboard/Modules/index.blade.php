@extends('layouts.dashboard')
@section('content')

<div class="container">
        <h2>Modules</h2>
        <p>Module information are displayed here</p>            
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Module Code</th>
              <th>Year taken</th>
              <th>Sem Taken</th>
              <th>Grade</th>
              <th>MC Worth</th>
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
      </div>
      

      <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" name="button">&times;</button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <p>Form starts here</p>
            </div>
              <div class="modal-footer">
                <button class="btn btn-warning" type="submit" id="add">
                  Add
                </button>
              </div>
          </div>
        </div>
      </div>


<a href="/modules/create" class="btn btn-default">Add Modules</a> 
{!! Form::open(['url' => 'foo/bar']) !!}
    
{!! Form::close() !!}

@endsection