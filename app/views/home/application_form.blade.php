@extends('layouts.main')

@section('content')

<form class="form-horizontal" role="form">

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
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success btn-lg btn-block">Save Now</button>
        </div>
        <div class="col-md-3"></div>
    </div>

</form>
@stop