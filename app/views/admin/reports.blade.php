@extends('layouts.admin-processor')

@section('content')
<div class="row search-query">

    {{ Form::open(['url' => 'admin/filter-results', 'id' => 'results-form']) }}
    <!-- Date start -->
    <div class="col-md-3">
        <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="search_date_start" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div><!-- /.col-md-4 -->

    <!-- Date end -->
    <div class="col-md-3">
        <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="search_date_end" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div><!-- /.col-md-4 -->

    <div class="col-md-3">
        {{ Form::submit('Filter', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
<div class="row table-container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Date Paid</th>
            <th>Name</th>
            <th>Exam Level</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody id="table-results">
        @foreach ($applicants as $applicant)
            <tr>
                <td>{{ $applicant->paid_date }}</td>
                <td>{{ $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name }}</td>
                <td>{{ $applicant->new_exam_level }}</td>
                <td>{{ $applicant->price }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
