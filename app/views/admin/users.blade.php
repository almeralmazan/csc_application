@extends('layouts.admin-processor')

@section('content')
<div class="row admin-users-container">
    <div class="col-md-12">
        <h3>Add user</h3>
    </div>
    <div class="col-md-4">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <select class="form-control">
                        <option value="" selected>--select role--</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Confirm password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
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
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Delete ?</th>
                </tr>
                </thead>
                <tbody>
                <tr id="row-sample1">
                    <td>1</td>
                    <td>John Smith</td>
                    <td>jsmith@gmail.com</td>
                    <td>admin</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs" id="btn-delete1">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
                <tr id="row-sample2">
                    <td>2</td>
                    <td>Kilgore Trout</td>
                    <td>ktrout@gmail.com</td>
                    <td>processor</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs"  id="btn-delete2">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
                <tr id="row-sample3">
                    <td>3</td>
                    <td>Bob Loblaw</td>
                    <td>bloblaw@gmail.com</td>
                    <td>processor</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs"  id="btn-delete3">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
                <tr id="row-sample4">
                    <td>4</td>
                    <td>Emily Hoenikker</td>
                    <td>ehoenikker@gmail.com</td>
                    <td>processor</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs"  id="btn-delete4">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
