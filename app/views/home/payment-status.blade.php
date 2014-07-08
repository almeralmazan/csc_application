@extends('layouts.main')

@section('header')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="container content">
    <div class="row margin-top">
        <div class="col-md-4 col-md-offset-4">
            {{ Form::open(['url' => 'search-control-no', 'id' => 'search-control-no-form']) }}
            <div class="input-group">
                {{ Form::text('control_number_field', null, ['id' => 'control-number-field', 'class' => 'form-control', 'placeholder' => 'Type your control # here']) }}

                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
            </div><!-- /input-group -->
            {{ Form::close() }}
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