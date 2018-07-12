 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="{{ url ('/dashboard') }}">Capulator | Set Your Destiny</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="{{ url ('/dashboard') }}">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
              <a class="nav-link" href="{{ url ('modules') }}">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Modules</span>
              </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-wrench"></i>
                  <span class="nav-link-text">Settings</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                  <li>
                    <a href="{{ url ('targetSetting') }}">Goals</a>
                  </li>
                  <li>
                    <a href="cards.html">SUs</a>
                  </li>
                </ul>
              </li>
              
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
              <a class="nav-link" href="{{ url ('notes') }}">
                <i class="fa fa-fw fa-table"></i>
                <span class="nav-link-text">Notes</span>
              </a>
            </li>

            
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
              <a class="nav-link" href="#">
                <i class="fa fa-fw fa-link"></i>
                <span class="nav-link-text">Link</span>
              </a>
            </li>
          </ul>
            @include('inc.userSideNav')
        </div>
      </nav>