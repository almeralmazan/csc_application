@extends('layouts.admin-processor')

@section('content')
<div class="col-md-10">
    <div class="row search-query hidden-print">
        <div class="col-md-10 col-md-offset-1">
            {{ Form::open(['url' => 'admin/filter-results', 'id' => 'results-form']) }}
            <!-- Date start -->
            <div class="col-md-4">
                <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd"
                     data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" name="search_date_start" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <!-- /.col-md-4 -->

            <!-- Date end -->
            <div class="col-md-4">
                <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd"
                     data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" name="search_date_end" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <!-- /.col-md-4 -->

            <div class="col-md-3">
                {{ Form::submit('Generate Reports', ['class' => 'btn btn-primary']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>

    <!--    <div class="row">-->
    <!--        <div class="col-md-12 col-md-offset-1 summary-report"></div>-->
    <!--    </div>-->

    <div id="summary-report" class="row margin-top hidden">
        <div class="col-md-6 col-md-offset-2">
            <div class="row">
                <h2>Summary Report</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-left">Total Profit</th>
                            <th id="total-profit-container" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">Sub Profressional</td>
                            <td id="sub-pro-container" class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-left">Profressional</td>
                            <td id="pro-container" class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-left">Disapproved</td>
                            <td id="disapproved-container" class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-left">Approved</td>
                            <td id="approved-container" class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-left">Reserved</td>
                            <td id="reserved-container" class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-left">Paid</td>
                            <td id="paid-container" class="text-center"></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-default hidden-print" onclick="window.print()">
                    Print <span class="glyphicon glyphicon-print"></span>
                </button>
            </div>
        </div>
    </div>

</div>


@stop
