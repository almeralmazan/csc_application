@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10" style="">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>SMS Code</h2>
            <hr>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>&lt;control#&gt;&lt;space&gt;&lt;request_type&gt;</td>
                    <td>Format to verify status</td>
                </tr>
                <tr>
                    <td>Ex. 0000001 exam_status</td>
                    <td>To check exam status if passed/failed</td>
                </tr>
                <tr>
                    <td>Ex. 0000002 applicant_status</td>
                    <td>To check applicant's status if approved/disapproved</td>
                </tr>
                <tr>
                    <td>Ex. 0000003 paid_status</td>
                    <td>To check payment status if paid/not paid</td>
                </tr>
                </tbody>
            </table>
            <div class="alert alert-warning">
                Note: Your sim card must be roam activated because SMS Gateway is outside of the Philippines.
            </div>
            <h2 class="alert alert-info">Send to +14849976019</h2>
        </div>
    </div>
</div>
@stop