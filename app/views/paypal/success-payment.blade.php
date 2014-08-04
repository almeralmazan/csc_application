@extends('layouts.main')

@section('content')
<div class="container margin-top ticket-container">
    <div class="row">
        <div class="row hidden-print">
            <div class="col-md-10 col-md-offset-1">
                <button class="btn btn-default" onclick="window.print()">
                    <span class="glyphicon glyphicon-print"></span>
                    Print
                </button>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 margin-top voucher">
            <div class="row">
                <div class="col-xs-3">
                    <ul class="list-unstyled margin-top">
                        <li>Date: <strong>{{ date('F j, Y') }}</strong></li>
                        <li>O.R No. <strong>123654</strong></li>
                        <li>Amount: <strong>500</strong></li>
<!--                        <li>Collecting Officer: <strong>Jose panghe</strong></li>-->
                    </ul>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Application Receipt</h2>
                            <h4 class="text-center">Exam Applied for</h4>
                            <ul class="list-inline text-center">
                                @if ($applicant->new_exam_mode == 'ppt')
                                    <li>
                                        <input type="checkbox" checked disabled>PPT
                                    </li>
                                    <li>
                                        <input type="checkbox" disabled>CAT
                                    </li>
                                @else
                                    <li>
                                        <input type="checkbox" disabled>PPT
                                    </li>
                                    <li>
                                        <input type="checkbox" checked disabled>CAT
                                    </li>
                                @endif

                                @if ($applicant->new_exam_level == 'Professional')
                                    <li>
                                        <input type="checkbox" checked disabled>Professional
                                    </li>
                                    <li>
                                        <input type="checkbox" disabled>Sub Professional
                                    </li>
                                @else
                                    <li>
                                        <input type="checkbox" disabled>Professional
                                    </li>
                                    <li>
                                        <input type="checkbox" checked disabled>Sub Professional
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-inline text-center">
                                <li>Date: <strong>{{ date('F j, Y', strtotime($applicant->schedule_date_start)) }}</strong></li>
                                <li>Time: <strong>{{ date('g:i a', strtotime($applicant->schedule_time_start)) . ' to ' . date('g:i a', strtotime($applicant->schedule_time_end)) }}</strong></li>
                                <li>Place: <strong>{{ $testing->location }}</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row margin-top">
                        <div class="col-xs-5 text-center signature">
                            <p>Signature over Printed Name of Processor</p>
                        </div>
                        <div class="col-xs-2 text-center">
                        </div>
                        <div class="col-xs-5 text-center signature">
                            <p>Date Recieved/Processed</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <h2 class="text-center"><small>Transaction #</small></h2>
                    <h5 style="margin-left: 20px"><strong>{{ $transactionNumber }}</strong></h5>
                </div>
                <div class="col-xs-3">
                    <img src="{{ URL::to('img/applicants', [$applicant->applicant_picture]) }}" class="center-block img-responsive" alt="">
                </div>
                <div class="col-xs-12">
                    <ul class="list-inline text-center">
                        <li>Applicant's Name: <strong>{{ $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name }}</strong></li>
                        <li>Sex: <strong>{{ $applicant->gender }}</strong></li>
                        <li>Date of Birth: <strong>{{ date('F j, Y', strtotime($applicant->date_of_birth)) }}</strong></li>
                    </ul>
                    <div class="row margin-top">
                        <div class="col-xs-2 col-xs-offset-5 signature">
                            <h5 class="text-center">Signature</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop