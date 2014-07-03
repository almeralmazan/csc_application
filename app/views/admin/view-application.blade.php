@extends('layouts.admin-processor')

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
        <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input name="date" class="form-control" size="16" type="text" value="2014-06-30" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
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
<div class="row table-container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Control number</th>
            <th>Name</th>
            <th>Schedule</th>
        </tr>
        </thead>
        <tbody>
        <tr class="success">
            <td><a href="">0001</a></td>
            <td><a href="">Mark Bukerti</a></td>
            <td>01/01/1991</td>
        </tr>
        <tr>
            <td><a href="">0002</a></td>
            <td><a href="">Jacob Abbe</a></td>
            <td>12/12/2014</td>
        </tr>
        <tr class="success">
            <td><a href="">0003</a></td>
            <td><a href="">Larry the Bird</a></td>
            <td>11/11/2014</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="row pagination-container">
    <ul class="pagination">
        <li><a href="#">«</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
    </ul>
</div>

@include('layouts.partials.admin-processor-footer')

</div>

@stop