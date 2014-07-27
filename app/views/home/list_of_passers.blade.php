@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10">
    <div class="row search-query">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Search here" ng-model="search_name">
        </div><!-- /.col-md-4 -->
        <div class="col-md-3">
            <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input name="date" class="form-control" size="16" type="text" value="" readonly ng-model="search_date">
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" />
        </div><!-- /.col-md-4 -->
        <div class="col-md-3">
            <select class="form-control" ng-model="exam_level">
                <option value="Sub Pro" selected>CSE - Sub Professional</option>
                <option value="Professional">CSE - Professional</option>
            </select>
        </div><!-- /.col-md-4 -->
    </div>
    <div class="row table-container" ng-controller="HomeSearchController">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Control number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Exam</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="applicant in applicants | filter:search_name | filter:search_date | filter:exam_level">
                <td>{[ applicant.controlno ]}</td>
                <td>{[ applicant.applicant_first_name ]}</td>
                <td>{[ applicant.applicant_last_name ]}</td>
                <td>{[ applicant.schedule_date_start | date ]}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@stop
