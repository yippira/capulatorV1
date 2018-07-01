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
      
      <div aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1" id="create" class="modal fade" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" aria-label="Close" class="close" data-dismiss="modal" name="button">&times;</button>
                <h4 class="modal-title">State the academic period</h4>
              </div>
              <div class="modal-body">
                
                  {!! Form::open(['url' => 'foo/bar']) !!}
                  <div class="form-group col-md-6 col-sm-6">
                      {{Form::label('year_taken', 'Year Taken')}} {{Form::select('year', ['2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019'],'null',['class' => 'form-control', 'placeholder' => 'Pick a Year', 'id' => 'year'])}}
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                      {{Form::label('sem_taken', 'Semester Taken')}} {{Form::select('semester', ['1' => '1', '2' => '2'],'null',['class' => 'form-control', 'placeholder' => 'Pick a Semester', 'id' => 'semester'])}}
                  </div>
                  <div class="form-group col-md-6 col-sm-6" id="num_modules">
                      {{Form::label('num_of_modules', 'Number of Modules taken')}} {{Form::select('modules', ['1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11', '12' => '12'],'null',['class' => 'form-control', 'placeholder' => 'Select number of modules taken'])}}
                  </div>
                  {!! Form::close() !!}
              </div>
                <div class="modal-footer">
                  <button class="btn btn-warning" type="submit" id="add">
                    Add
                  </button>
                </div>
            </div>
          </div>
        </div> 



@endsection