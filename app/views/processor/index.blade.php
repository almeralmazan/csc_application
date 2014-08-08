@extends('layouts.admin-processor')

@section('content')

<div class="col-md-10">
    @if (Session::has('message'))
    <div class="row">
        <div class="col-md-12">
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

    <div class="row">
        <div class="col-md-12">
            <h2>List of Paid Applicants</h2>
            <hr>
        </div>
    </div>

    <div class="row search-query">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Search transaction no." ng-model="search_trno.transaction_number">
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-3">
            <select class="form-control" name="exam_level" ng-model="exam_level">
                <option value="Sub Pro">CSE - Sub Professional</option>
                <option value="Professional">CSE - Professional</option>
            </select>
        </div>
        <!-- /.col-md-4 -->
    </div>
    <div class="row table-container" ng-controller="ProcessorSearchController">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Transaction Number</th>
                <th>Name</th>
                <th>Schedule</th>
                <th>Exam Level</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="applicant in applicants | filter:exam_level | filter:search_trno">
                <td>{[ applicant.transaction_number ]}</td>
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
