@extends('layouts.main')

@section('header')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="container content">

    <div id="error-message"><ul id="list-of-errors"></ul></div>

<!--<form class="form-horizontal" role="form">-->
{{ Form::open(['url' => 'validate-inputs', 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'applicant-form']) }}

    <!--  Applicant Name -->
    @include('home.partials.applicant_name')

    <!--  Facts of Birth  -->
    @include('home.partials.facts_of_birth')

    <!--  Current Demographic Data  -->
    @include('home.partials.current_demographic_data')

    <!--  Exam Information -->
    @include('home.partials.exam_information')

    <!--  Requirements -->
    @include('home.partials.requirements')

    <!-- Save Button -->
    <div class="row">
        <div class="col-md-6">
            {{ Form::submit('Save Now', ['class' => 'btn btn-success btn-lg btn-block']) }}
        </div>
        <div class="col-md-6">
            {{ HTML::link('proceed-to-payment', 'Save and Proceed to Payment' ,['class' => 'btn btn-primary btn-lg btn-block']) }}
        </div>
    </div>

{{ Form::close() }}
</div>
@stop