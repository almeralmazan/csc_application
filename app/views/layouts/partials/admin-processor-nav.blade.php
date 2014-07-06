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
            @if (Auth::user()->role == 'admin')
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
<!--                <li class="{{ set_active('admin/reports') }}">-->
<!--                    {{ HTML::link('admin/reports', 'Reports') }}-->
<!--                </li>-->
            @else
                <li class="{{ set_active('processor') }}">
                    {{ HTML::link('processor', 'View Application') }}
                </li>
            @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><p class="navbar-text">Welcome {{ Auth::user()->username }}</p></li>
                <li>
                @if (Auth::user()->role == 'admin')
                    <a href="{{ URL::to('admin/logout') }}"><span class="glyphicon glyphicon-off"></span> Logout</a>
                @else
                    <a href="{{ URL::to('processor/logout') }}"><span class="glyphicon glyphicon-off"></span> Logout</a>
                @endif
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>