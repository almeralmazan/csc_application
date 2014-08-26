@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 well margin-top">

            {{ Form::open(['id' => 'search-denied-applicant', 'class' => 'form-inline', 'role' => 'form']) }}
                <div class="form-group">
                    <input type="text" id="denied-applicant-control-no" class="form-control" placeholder="Control Number" style="width: 280px;">
                </div>

                <button type="submit" class="btn btn-primary">
                    Proceed
                </button>
            {{ Form::close() }}

        </div>
    </div>
</div>

<div class="col-md-10 hidden" id="denied-application-form">
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