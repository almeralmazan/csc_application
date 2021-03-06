@extends('layouts.admin-processor')

@section('content')
<div class="container margin-top">
    <div class="row margin-top">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('/processor/applicant/' . $applicant->id) }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>
    <div class="row margin-top">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Status</div>
                {{ Form::open(['url' => 'processor/update/applicant/' . $applicant->id]) }}
                <div class="panel-body text-left">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Status</label>
                        </div>
                        <div class="col-md-7">
                            {{ Form::select('applicant_status',
                                ['0' => 'Disapprove', '1' => 'Approve', '2' => 'Not Verified'],
                                $applicant->applicant_status,
                                ['class' => 'form-control']); }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Payment Status</label>
                        </div>
                        <div class="col-md-7">
                            {{ Form::select('paid_status',
                            ['1' => 'Paid', '0' => 'Not Paid'],
                            $applicant->paid_status,
                            ['class' => 'form-control']); }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Exam Status</label>
                        </div>
                        <div class="col-md-7">
                            {{ Form::select('exam_status',
                            ['0' => 'Failed', '1' => 'Pass', '2' => 'Scheduled For Exam'],
                            $applicant->exam_status,
                            ['class' => 'form-control']); }}
                        </div>
                    </div>
                    <div class="row margin-top">
                        <div class="col-md-6">
                            {{ Form::submit('Update', ['class' => 'btn btn-block btn-primary']) }}
                        </div>
                        <div class="col-md-6">
                            {{ HTML::link('processor/applicant/' . $applicant->id, 'Cancel', ['class' => 'btn btn-block btn-danger']) }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>

        @if (Session::has('message'))
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@stop
