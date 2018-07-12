
    <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                        <a href="{{ url ('/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li {{ (Request::is('*modules') ? 'class="active"' : '') }}>
                        <a href="{{ url ('modules') }}"><i class="fa fa-table fa-fw"></i> Modules</a>
                    </li>
                    <li {{ (Request::is('*target_setting') ? 'class="active"' : '') }}>
                            <a href="{{ url ('targetSetting') }}"><i class="fa fa-bullseye fa-fw"></i> Target Setting</a>
                    </li>
                    <li {{ (Request::is('*notes') ? 'class="active"' : '') }}>
                        <a href="{{ url ('notes') }}"><i class="fa fa-edit fa-fw"></i> Notes</a>
                    </li>                
    
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->