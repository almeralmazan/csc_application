@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10" style="">
    <div class="row">+
        <div class="col-md-10 col-md-offset-1">
            <h2>Requirements for applying</h2>
            <h4>2x2 photo</h4>
            <img src="img/sample-image.png" alt="">
            <h4>Valid ID's and Documents</h4>
            <ul class="list-inline">
                <li><img src="img/images.jpg" alt=""></li>
                <li><img src="img/download.jpg" alt=""></li>
                <li><img src="img/postal_id.jpg" alt=""></li>
            </ul>
        </div>
    </div>
</div>
@stop