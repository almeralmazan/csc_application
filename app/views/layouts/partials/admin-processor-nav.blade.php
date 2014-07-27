<div class="col-md-2 margin-top">
    <div class="list-group side-nav">
        @if (Auth::user()->role == 'admin')
            <a href="/admin" class="list-group-item {{ set_active('admin') }}">
                <i class="fa fa-comment-o"></i><span class="glyphicon glyphicon-home"></span> View Application
            </a>
            <a href="/admin/list-of-passers" class="list-group-item {{ set_active('admin/list-of-passers') }}">
                <i class="fa fa-search"></i><span class="glyphicon glyphicon-pencil"></span>  List of Passers
            </a>
            <a href="/admin/schedules" class="list-group-item {{ set_active('admin/schedules') }}">
                <i class="fa fa-user"></i><span class="glyphicon glyphicon-list-alt"></span>  Schedules
            </a>
            <a href="/admin/users" class="list-group-item {{ set_active('admin/users') }}">
                <i class="fa fa-folder-open-o"></i><span class="glyphicon glyphicon-user"></span> Users
            </a>
            <a href="/admin/reports" class="list-group-item {{ set_active('admin/reports') }}">
                <i class="fa fa-folder-open-o"></i><span class="glyphicon glyphicon-calendar"></span> Reports
            </a>
            <a href="/admin/logout" class="list-group-item {{ set_active('admin/logout') }}">
                <i class="fa fa-folder-open-o"></i><span class="glyphicon glyphicon-off"></span> Logout - {{ Auth::user()->username }}
            </a>
        @else
            <a href="/admin/users" class="list-group-item {{ set_active('admin/users') }}">
                <i class="fa fa-folder-open-o"></i><span class="glyphicon glyphicon-user"></span> Users
            </a>
            <a href="/admin/reports" class="list-group-item {{ set_active('admin/reports') }}">
                <i class="fa fa-folder-open-o"></i><span class="glyphicon glyphicon-calendar"></span> Reports
            </a>
            <a href="/processor/logout" class="list-group-item {{ set_active('processor/logout') }}">
                <i class="fa fa-folder-open-o"></i><span class="glyphicon glyphicon-off"></span> Logout - {{ Auth::user()->username }}
            </a>
        @endif
    </div>
</div>
