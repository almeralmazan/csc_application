@extends('layouts.admin-processor')

@section('content')
<div class="col-md-10">
    <div class="row admin-users-container">
        <div class="col-md-12">
            <h3>Add Schedule</h3>
        </div>
        <div class="col-md-3">
            {{ Form::open(['url' => 'admin/add/schedule', 'role' => 'form']) }}
            <form role="form">
                <div class="form-group">
                    <label for="location">Location</label>
                    <select name="admin_add_testing_centers" id="location" class="form-control">
                        <option value="empty">--Select location--</option>
                        @foreach ($locations as $loc)
                        <option value="{{ $loc->id }}">{{ $loc->location }}</option>
                        @endforeach
                    </select>
                    <span class="alert-danger">{{ $errors->first('admin_add_testing_centers') }}</span>
                </div>
                <div class="form-group">
                    <label>Date Start</label>

                    <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd"
                         data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input name="admin_add_date_start" class="form-control" size="16" type="text"
                               value="{{ Input::old('admin_add_date_start') }}" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <span class="alert-danger">{{ $errors->first('admin_add_date_start') }}</span>
                </div>
                <div class="form-group">
                    <label>Time Start</label>

                    <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii"
                         data-link-field="dtp_input3" data-link-format="hh:ii">
                        <input class="form-control" size="16" type="text" name="admin_add_time_start"
                               value="{{ Input::old('admin_add_time_start') }}" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                    </div>
                    <span class="alert-danger">{{ $errors->first('admin_add_time_start') }}</span>
                </div>
                <div class="form-group">
                    <label>Time End</label>

                    <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii"
                         data-link-field="dtp_input3" data-link-format="hh:ii">
                        <input class="form-control" size="16" type="text" name="admin_add_time_end"
                               value="{{ Input::old('admin_add_time_end') }}" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                    </div>
                    <span class="alert-danger">{{ $errors->first('admin_add_time_end') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{ Form::close() }}
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
                    <input type="text" class="form-control" id="task-table-filter" data-action="filter"
                           data-filters="#task-table" placeholder="Filter Tasks"/>
                </div>
                <table class="table table-hover" id="task-table">
                    <thead>
                    <tr>
                        <th>Location</th>
                        <th>Date start</th>
                        <th>Time start</th>
                        <th>Time end</th>
                        <th>Delete ?</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->location }}</td>
                        <td>{{ $schedule->date_start }}</td>
                        <td>{{ $schedule->time_start }}</td>
                        <td>{{ $schedule->time_end }}</td>
                        <td>
                            <a href="#" data-schedule-id="{{ $schedule->id }}"
                               data-testing-center-id="{{ $schedule->testing_center_id }}"
                               class="delete-schedule btn btn-danger btn-xs">
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
</div>
@stop
