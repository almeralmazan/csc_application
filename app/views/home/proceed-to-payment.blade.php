@extends('layouts.main')

@section('content')
<div class="row">
    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <address>
                    <strong>Civil Services Commission</strong>
                    <br>
                    2135 Sunset Blvd
                    <br>
                    Los Angeles, CA 90026
                    <br>
                    <abbr title="Phone">Tel. #</abbr> 951-2578; 931-8163
                </address>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                <p>
                    <em>Date: July 7, 2014</em>
                </p>
                <p>
                    <em>Control #: 34522677W</em>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <p>Exam details:</p>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9">
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
            <div class="text-center">
                <h1>Reciept</h1>
            </div>
            </span>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center">Location</th>
                    <th class="text-center">Date start</th>
                    <th class="text-center">Time start</th>
                    <th class="text-center">Time end</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="col-md-2 text-center"> Quezon City </td>
                    <td class="col-md-2 text-center"> July 4, 2014 </td>
                    <td class="col-md-2 text-center"> 8:00 AM </td>
                    <td class="col-md-2 text-center"> 4:30 PM </td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td class="text-right">
                        <p>
                            <strong>Subtotal: </strong>
                        </p>
                        <p>
                            <strong>Tax: </strong>
                        </p>
                    </td>
                    <td class="text-center">
                        <p>
                            <strong>$6.94</strong>
                        </p>
                        <p>
                            <strong>$6.94</strong>
                        </p></td>
                </tr>
                <tr class="text-right">
                    <td>   </td>
                    <td>   </td>
                    <td><strong>Total: </strong></td>
                    <td class="text-center text-danger"><strong>$31.53</strong></td>
                </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-success btn-lg btn-block">
                Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
            </button></td>
        </div>
    </div>
</div>
@stop