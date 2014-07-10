@extends('layouts.admin-processor')

@section('content')
<div class="row">
    <div class="col-md-1">
    </div>
<!--    <div class="col-md-11">-->
<!--        <a href="{{ URL::to('processor') }}" class="btn btn-default">-->
<!--            <span>-->
<!--                {{ HTML::image('img/back.png') }}-->
<!--            </span>-->
<!--        </a>-->
<!--    </div>-->
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $applicant->applicant_first_name .' '. $applicant->applicant_last_name }}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        {{ HTML::image('img/applicants/' . $applicant->applicant_picture, 'User Pic', ['class' => 'img-circle', 'width' => '120']) }}
                    </div>
                    <div class=" col-md-9 col-lg-9 ">
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
                            <td>Mobile:</td>
                            <td>{{ $applicant->mobile_number }}</td>
                            </tr>

                            </tbody>
                        </table>

                        <a href="#" class="btn btn-primary">Approve</a>
                        <a href="#" class="btn btn-warning">Disapprove</a>
                        <a href="#" class="btn btn-info">Paid</a>
                        <a href="#" class="btn btn-success">Pass</a>
                        <a href="#" class="btn btn-danger">Failed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop