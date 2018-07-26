<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark dark-navyblue fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url ('/dashboard') }}"><img width="30px" class="img-fluid" src="images/CAP2.png"> &nbsp Capulator | Set Your Destiny</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav dark-navyblue" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url ('/dashboard') }}">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text nav-link-text-dashboard">Dashboard</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="{{ url ('modules') }}">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text nav-link-text-dashboard">Modules</span>
              </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-wrench"></i>
                  <span class="nav-link-text nav-link-text-dashboard">Settings</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="{{url('user')}}">User Settings</a>
                    </li>
                    <li>
                        <a href="{{ url ('targetSetting') }}">CAP Goal</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{{ url ('notes') }}">
                <i class="fa fa-fw fa-table"></i>
                <span class="nav-link-text nav-link-text-dashboard">Notes</span>
              </a>
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                <a class="nav-link" href="#">
                <i class="fa fa-fw fa-link"></i>
                <span class="nav-link-text nav-link-text-dashboard">Link</span>
              </a>
            </li>
        </ul>
    @include('inc.userSideNav')
    </div>
</nav>