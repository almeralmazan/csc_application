@extends('layouts.admin-processor')

@section('content')
<div class="row admin-users-container">
    <div class="col-md-12">
        <h3>Add Schedule</h3>
    </div>
    <div class="col-md-3">
        <form role="form">
            <div class="form-group">
                <label for="location">Location</label>
                <select name="admin-testing-centers" id="location" class="form-control">
                    <option value="empty">--Select location--</option>
                    @foreach ($locations as $loc)
                    <option value="{{ $loc->location }}">{{ $loc->location }}</option>
                    @endforeach
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
                            <a href="{{ URL::to('admin/delete/schedule', $schedule->id) }}" class="btn btn-danger btn-xs">
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
