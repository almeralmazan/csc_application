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

</form>
@stop