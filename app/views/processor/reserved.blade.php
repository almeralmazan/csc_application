@extends('layouts.admin-processor')

@section('content')
<div class="col-md-10">
    <div class="row">
        <div class="col-md-12">
            <h2>List of Reserved Applicants</h2>
            <hr>
        </div>
    </div>
    <div class="row search-query">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Search Control #" ng-model="search_ctrl_no.controlno">
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-3">
            <select class="form-control" ng-model="exam_level">
                <option value="Sub Pro">CSE - Sub Professional</option>
                <option value="Professional">CSE - Professional</option>
            </select>
        </div>
        <!-- /.col-md-4 -->
    </div>
    <div class="row table-container" ng-controller="ProcessorReservedController">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Control number</th>
                <th>Name</th>
                <th>Schedule</th>
                <th>Exam Level</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="applicant in applicants | filter:exam_level | filter:search_ctrl_no">
                <td>{[ applicant.controlno ]}</td>
                <td>
                    <a href="{[ window.location.origin + '/processor/applicant/' + applicant.id ]}">
                        {[ applicant.applicant_first_name + ' ' + applicant.applicant_last_name ]}
                    </a>
                </td>
                <td>{[ applicant.schedule_date_start | date ]}</td>
                <td>{[ applicant.new_exam_level ]}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@stop

