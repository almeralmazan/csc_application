@extends('layouts.main')

@section('header')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10">
    <div class="logo-app-form">
        <center>{{ HTML::image('img/logo-app-form.png') }}</center>
    </div>

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
            <div class="col-md-offset-3 col-md-6">
                {{ Form::submit('Save Now', ['class' => 'btn btn-success btn-lg btn-block']) }}
            </div>
        </div>

    {{ Form::close() }}
</div>
@stop