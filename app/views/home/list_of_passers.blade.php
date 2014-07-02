@extends('layouts.main')

@section('content')
<div class="row search-query">
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search here">
            <span class="input-group-btn">
              <button class="btn btn-success" type="button">Go!</button>
            </span>
        </div><!-- /input-group -->
    </div><!-- /.col-md-4 -->
    <div class="col-md-3">
        <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM d, yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input name="date" class="form-control" size="16" type="text" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <input type="hidden" id="dtp_input2" value="" />
    </div><!-- /.col-md-4 -->
    <div class="col-md-3">
        <select class="form-control">
            <option value="" selected>CSE - Sub Professional</option>
            <option value="">CSE - Professional</option>
        </select>
    </div><!-- /.col-md-4 -->
</div>
<div class="row">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicants as $applicant)
            <tr>
                <td>{{ $applicant->csid_no }}</td>
                <td>{{ $applicant->applicant_first_name }}</td>
                <td>{{ $applicant->applicant_last_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop