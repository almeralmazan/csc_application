@extends('layouts.admin-processor')

@section('content')
<div class="row admin-users-container">
    <div class="col-md-12">
        <h3>Add schdule</h3>
    </div>
    <div class="col-md-3">
        <form role="form">
            <div class="form-group">
                <label for="location">Location</label>
                <select name="" id="location" class="form-control">
                    <option value="">--Select location--</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date start</label>
                <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM d, yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input name="date" class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label>Date end</label>
                <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM d, yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input name="date" class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label>Time start</label>
                <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label>Time end</label>
                <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="col-md-9">
        <div class="panel panel-success" style="margin-top: 23px;">
            <div class="panel-heading admin-users-heading">
                <h3 class="panel-title">Schedules</h3>
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
                    <th>Location</th>
                    <th>Date start</th>
                    <th>Date end</th>
                    <th>Time start</th>
                    <th>Time end</th>
                    <th>Delete ?</th>
                </tr>
                </thead>
                <tbody>
                <tr id="row-sample1">
                    <td>1</td>
                    <td>John Smith</td>
                    <td>jsmith@gmail.com</td>
                    <td>admin</td>
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
                    <td>John Smith</td>
                    <td>jsmith@gmail.com</td>
                    <td>admin</td>
                    <td>jsmith@gmail.com</td>
                    <td>admin</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs"  id="btn-delete2">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
                <tr id="row-sample3">
                    <td>3</td>
                    <td>John Smith</td>
                    <td>jsmith@gmail.com</td>
                    <td>admin</td>
                    <td>jsmith@gmail.com</td>
                    <td>admin</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs"  id="btn-delete3">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
                <tr id="row-sample4">
                    <td>4</td>
                    <td>John Smith</td>
                    <td>jsmith@gmail.com</td>
                    <td>admin</td>
                    <td>jsmith@gmail.com</td>
                    <td>admin</td>
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
