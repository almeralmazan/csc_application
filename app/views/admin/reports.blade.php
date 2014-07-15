@extends('layouts.admin-processor')

@section('content')
<div class="row search-query">
    <!-- Date start -->
    <div class="col-md-3">
        <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input name="date" class="form-control" size="16" type="text" value="" readonly ng-model="search_date_start">
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div><!-- /.col-md-4 -->

    <!-- Date end -->
    <div class="col-md-3">
        <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input name="date" class="form-control" size="16" type="text" value="" readonly ng-model="search_date_end">
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div><!-- /.col-md-4 -->
</div>
<div class="row table-container" ng-controller="AdminReportController">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Date Paid</th>
            <th>Name</th>
            <th>Exam Level</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="applicant in applicants | filter:search_date_start | filter:search_date_end">
            <td>{[ applicant.controlno ]}</td>
            <td>{[ applicant.applicant_first_name ]}</td>
            <td>{[ applicant.applicant_last_name ]}</td>
            <td>{[ applicant.schedule_date_start | date ]}</td>
        </tr>
        </tbody>
    </table>
</div>
@stop
