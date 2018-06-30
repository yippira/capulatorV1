
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                    <a href="{{ url ('/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                    <a href="{{ url ('modules') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*modules') ? 'class="active"' : '') }}>
                    <a href="{{ url ('modules') }}"><i class="fa fa-table fa-fw"></i> Modules</a>
                </li>
                <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                    <a href="{{ url ('forms') }}"><i class="fa fa-edit fa-fw"></i> Notes</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->