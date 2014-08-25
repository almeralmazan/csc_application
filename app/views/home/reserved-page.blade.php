@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron jumbo-reserved">
            <div class="row">
                <div class="col-md-12">
                    <h1>You've successfully reserved!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <p>Control #:</p>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-10">
                    <p><strong>{{ $applicant->controlno }}</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <p>Name:</p>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-10">
                    <p><strong>{{ $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name }}</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <p>Exam details:</p>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-10">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Location</th>
                            <th>Date Start</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $testingCenter->location }}</td>
                            <td>{{ date('F j, Y - l', strtotime($applicant->schedule_date_start)) }}</td>
                            <td>{{ date('g:i A', strtotime($applicant->schedule_time_start)) }}</td>
                            <td>{{ date('g:i A', strtotime($applicant->schedule_time_end)) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <p>Deposit payment to:</p>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-10">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Exam Fee</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Bank</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $payment->price }}</td>
                            <td>Civil Service Commission</td>
                            <td>4951-0067-56</td>
                            <td>Land Bank Of The Philippines</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row margin-top">

                <div class="row">
                    <div class="col-md-12 hidden-print">
                        <p class="btn-continue">

                            {{ Form::open(['url' => 'buy-with-paypal', 'method' => 'GET', 'class' => 'text-center']) }}
                            {{ Form::hidden('controlNumber', $applicant->controlno) }}

                            <a href="{{ URL::to('/') }}" class="btn btn-success btn-lg" role="button">
                                Go back to Main Website
                            </a>

                            {{ Form::submit('Save and Proceed to Payment', ['class' => 'btn btn-primary btn-lg']) }}
                            {{ Form::close() }}
                        </p>

                        <div class="text-center">
                            <a class="btn btn-default btn-lg" role="button" onclick="window.print()">
                                <span class="glyphicon glyphicon-print"></span> print
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
