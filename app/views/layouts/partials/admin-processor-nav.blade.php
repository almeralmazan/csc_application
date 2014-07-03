<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Civil Service Commission</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ set_active('admin') }}">
                    {{ HTML::link('admin', 'View Application') }}
                </li>
                <li class="{{ set_active('admin/list-of-passers') }}">
                    {{ HTML::link('admin/list-of-passers', 'List of Passers') }}
                </li>
                <li class="{{ set_active('admin/schedules') }}">
                    {{ HTML::link('admin/schedules', 'Schedules') }}
                </li>
                <li class="{{ set_active('admin/users') }}">
                    {{ HTML::link('admin/users', 'Users') }}
                </li>
                <li class="{{ set_active('admin/reports') }}">
                    {{ HTML::link('admin/reports', 'Reports') }}
                </li>
            </ul>
            <div class="navbar-right">
                <span id="welcome">Welcome, {{ Auth::user()->username }}</span>
                <a href="{{ URL::to('admin/logout') }}" class="btn btn-default">Logout</a>
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>