@extends('layouts.admin-processor')

@section('content')
<div class="col-md-10">
    <div class="row search-query">
        {{ Form::open(['url' => 'admin/filter-results', 'id' => 'results-form']) }}
        <!-- Date start -->
        <div class="col-md-3">
            <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd"
                 data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" name="search_date_start" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <!-- /.col-md-4 -->

        <!-- Date end -->
        <div class="col-md-3">
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

    <div class="row">
        <div class="col-md-12 col-md-offset-1 summary-report"></div>
    </div>
</div>


@stop
