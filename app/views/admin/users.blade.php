@extends('layouts.admin-processor')

@section('content')
<div class="row admin-users-container">
    <div class="col-md-12">
        <h3>Add User</h3>
    </div>
    <div class="col-md-4">
        {{ Form::open(['url' => 'admin/validate-add-user', 'id' => 'add-user-form', 'class' => 'form-horizontal', 'role' => 'form']) }}
            <div class="form-group">
                <div class="col-sm-12">
                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name', 'autofocus']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    {{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    {{ Form::select('role', [
                        'empty' =>  '-- Select Role --',
                        'admin' =>  'admin',
                        'processor' =>  'processor'
                    ], 'empty', ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    {{ Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Password Confirmation']) }}
                </div>
            </div>

            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

            <!-- Error container -->
            <div id="add-user-error-message">
                <ul id="list-of-errors"></ul>
            </div>

        {{ Form::close() }}
    </div>
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading admin-users-heading">
                <h3 class="panel-title">Users</h3>
                <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                <span>Click to search &nbsp;</span><i class="glyphicon glyphicon-search"></i>
              </span>
                </div>
            </div>
            <div class="panel-body admin-users-body">
                <input type="text" class="form-control" id="task-table-filter" data-action="filter" data-filters="#task-table" placeholder="Filter Tasks" />
            </div>
            <table class="table table-hover" id="task-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Delete ?</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-xs" id="btn-delete1">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
