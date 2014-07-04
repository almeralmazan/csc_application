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
                    <input type="text" id="name" class="form-control" name="name" value="{{ e(Input::old('name')) }}" placeholder="Name" autofocus/>
                    <span class="alert-danger">{{ $errors->first('name') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="username" class="form-control" name="username" value="{{ e(Input::old('username')) }}" placeholder="Username"/>
                    <span class="alert-danger">{{ $errors->first('username') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    {{ Form::select('role', [
                        'empty' =>  '-- Select Role --',
                        'admin' =>  'admin',
                        'processor' =>  'processor'
                    ], 'empty', ['class' => 'form-control']) }}
                    <span class="alert-danger">{{ $errors->first('role') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" id="password" class="form-control" name="password" value="{{ e(Input::old('password')) }}" placeholder="Password"/>
                    <span class="alert-danger">{{ $errors->first('password') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" id="password-confirmation" class="form-control" name="password_confirmation" value="{{ e(Input::old('password_confirmation')) }}" placeholder="Password Confirmation"/>
                    <span class="alert-danger">{{ $errors->first('password_confirmation') }}</span>
                </div>
            </div>

            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

            <!-- Error container -->
            @if (Session::has('message'))
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                       {{ Session::get('message') }}
                    </div>
                </div>
            </div>
            @endif

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
                            <a href="{{ URL::to('admin/delete/user', $user->id) }}" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
