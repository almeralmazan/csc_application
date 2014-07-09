@extends('layouts.admin-processor')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>List of Paid Applicants</h2>
        <hr>
    </div>
</div>
<div class="row search-query">
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search here">
            <span class="input-group-btn">
              <button class="btn btn-success" type="button">Go!</button>
            </span>
        </div><!-- /input-group -->
    </div><!-- /.col-md-4 -->
    <div class="col-md-3">
        <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input name="date" class="form-control" size="16" type="text" value="2014-06-30" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <input type="hidden" id="dtp_input2" value="" />
    </div><!-- /.col-md-4 -->
    <div class="col-md-3">
        <select class="form-control" name="exam_level">
            <option value="subpro" selected>CSE - Sub Professional</option>
            <option value="pro">CSE - Professional</option>
        </select>
    </div><!-- /.col-md-4 -->
</div>
<div class="row table-container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Control number</th>
                <th>Name</th>
                <th>Schedule</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($applicants as $applicant)
            <tr>
                <td>{{ $applicant->controlno }}</a></td>
                <td><a href="{{ URL::to('processor/applicant/' . $applicant->id) }}">{{ $applicant->applicant_first_name .' '. $applicant->applicant_last_name }}</a></td>
                <td>{{ date('F j, Y', strtotime($applicant->schedule_date_start)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
