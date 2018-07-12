@extends('layouts.dashboard')
@section('content')
<h2>Dashboard</h2>
<div class="row">
        <div class="col-sm-12 col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-check fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <div class="huge">{{$current_CAP}}</div>
                                <div>Current CAP</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/modules">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
    <div class="col-sm-12 col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class="huge">{{$mc_taken}}</div>
                        <div>MC Taken</div>
                    </div>
                </div>
            </div>
            
            <a href="/modules">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class="huge">{{160 - $mc_taken}}</div>
                        <div>MC Till Graduation</div>
                    </div>
                </div>
            </div>
            
            <a href="/modules">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
    

    <div class="row">

            <div class="col-sm-12 col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-percent fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <div class="huge">{{$mc_taken/160 * 100}}% completion</div>
                                    <div>progress done</div>
                                </div>
                            </div>
                        </div>
                        
                        <a href="/modules">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
    </div>
    <div class='col-md-6'>
    <canvas id="myChart"></canvas>
    </div>
    <div class="col-md-6">
            <div class='m-5 pb-5 col-md-8' id="goalSetting">

                </div>
    
    </div>

    <div class="card">
        <h2>Testing</h2>
    </div>
    <script src="{{ asset("assets/scripts/progressbar.min.js") }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> 
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["2016/1", "2016/2", "2017/1", "2017/2", "2018/1", "2018/2"],
        datasets: [{
            label: "Your CAP",
            backgroundColor: 'rgb(74, 179, 213)',
            borderColor: 'rgb(120, 204, 197)',
            data: [5, 4.75, 4.22, 4.43, 4.6, 4.5],
        }]
    },

    // Configuration options go here
    options: {}
});


</script>

{{-- This is our semi circle goal setting --}}
<script>

    

    var bar = new ProgressBar.SemiCircle(goalSetting, {
  strokeWidth: 6,
  color: '#FFEA82',
  trailColor: '#eee',
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  svgStyle: null,
  text: {
    value: '',
    alignToBottom: false
  },
  from: {color: '#FFEA82'},
  to: {color: '#ED6A5A'},
  // Set default step function for all animate calls
  step: (state, bar) => {
    bar.path.setAttribute('stroke', state.color);
    var value = Math.round(bar.value() * 100);
    if (value === 0) {
      bar.setText('');
    } else {
      bar.setText(value);
    }

    bar.text.style.color = state.color;
  }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '2rem';

bar.animate(1.0);  // Number from 0.0 to 1.0
    </script>
</div>
@endsection