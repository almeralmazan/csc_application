@extends('layouts.admin-processor')

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
                    <p><strong>214AG32H1</strong></p>
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
                            <td>Quezon City</td>
                            <td>July 11, 2014</td>
                            <td>8:00 AM</td>
                            <td>2:30 PM</td>
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
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Bank</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Philippine Daily Inquirer Inc.</td>
                            <td>4951-0067-56</td>
                            <td>Bank of the Philippine Islands</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="btn-continue"><a class="btn btn-success btn-lg" role="button">Continue browsing</a></p>
                </div>
            </div>
        </div>
    </div>
@stop
