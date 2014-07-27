@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="container content">
    <div class="row margin-top">
        <div class="col-md-4 col-md-offset-4">
            <input id="control-number-field" class="form-control" placeholder="Type your control # here" name="control_number_field" type="text">
        </div><!-- /.col-md-6 -->
    </div>
    <div class="row margin-top">
        <div class="col-md-4 col-md-offset-4" id="status-container">
            <div class="well">
                <div class="row">
                    <div class="col-md-4">
                        <h3><small>Status:</small></h3>
                    </div>
                    <div class="col-md-8">
                        <h3><span class="label label-success" id="status-paid"></span></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h3><small>Name:</small></h3>
                    </div>
                    <div class="col-md-8">
                        <h3 id="applicant-name"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h3><small>Exam date:</small></h3>
                    </div>
                    <div class="col-md-8">
                        <h3 id="schedule-date-start"></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop