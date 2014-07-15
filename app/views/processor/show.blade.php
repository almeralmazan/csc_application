@extends('layouts.admin-processor')

@section('content')
<div class="row">
    <div class="col-md-1">
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-2 margin-top" >
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $applicant->applicant_first_name .' '. $applicant->applicant_last_name }}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        {{ HTML::image('img/applicants/' . $applicant->applicant_picture, 'User Pic', ['class' => 'img-circle img-responsive applicant-image']) }}
                    </div>
                    <div class=" col-md-9 col-lg-9 applicant-details">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Date of Birth:</td>
                                        <td>{{ date('F j, Y', strtotime($applicant->date_of_birth)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>{{ $applicant->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td>Home Address:</td>
                                        <td>{{ $applicant->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><a href="mailto:{{ $applicant->email }}">{{ $applicant->email }}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile:</td>
                                        <td>{{ $applicant->mobile_number }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12 text-center">
                                    <h4>
                                        @if ($applicant->applicant_status == 0)
                                            <span class="label label-danger">Disapprove</span>
                                        @elseif ($applicant->applicant_status == 1)
                                            <span class="label label-success">Approve</span>
                                        @else
                                            <span class="label label-info">Not Verified</span>
                                        @endif

                                        @if ($applicant->paid_status == 1)
                                            <span class="label label-success">Paid</span>
                                        @else
                                            <span class="label label-danger">Not Paid</span>
                                        @endif

                                        @if ($applicant->exam_status == 0)
                                            <span class="label label-danger">Failed</span>
                                        @elseif ($applicant->paid_status == 1)
                                            <span class="label label-success">Passed</span>
                                        @else
                                            <span class="label label-info">Scheduled for exam</span>
                                        @endif

                                    </h4>
                                    <a href="{{ URL::to('processor/update/applicant/' . $applicant->id) }}" class="text-left"> Edit Status</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row margin-top">
                    <div class="alert-info">
                        <h3 class="text-center">Requirements</h3>
                    </div>
                    <div class="col-md-6 text-center">
                        <h4>{{ $applicant->requirement_type_1 }}</h4>
                        <a href="{{ URL::to('img/applicants/' . $applicant->requirement_image_1) }}" data-lightbox="roadtrip">
                            {{ HTML::image('img/applicants/' . $applicant->requirement_image_1, 'Requirement 1', ['data-lightbox' => 'roadtrip', 'width' => '150']) }}
                        </a>
                    </div>
                    <div class="col-md-6 text-center">
                        <h4>{{ $applicant->requirement_type_2 }}</h4>
                        <a href="{{ URL::to('img/applicants/' . $applicant->requirement_image_2) }}" data-lightbox="roadtrip">
                            {{ HTML::image('img/applicants/' . $applicant->requirement_image_2, 'Requirement 2', ['width' => '150']) }}
                        </a>
                    </div>
                </div>
            </div>

    </div>

    </div>
</div>

@stop