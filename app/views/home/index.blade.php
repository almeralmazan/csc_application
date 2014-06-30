@extends('layouts.main')

@section('content')
<div class="jumbotron">
    <div class="row">
        <div class="col-md-12">
            {{ HTML::image('img/csc-logo.png', null, ['class' => 'logo']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h1>Mission</h1>
            <p>Gawing Lingkod-Bayani ang Bawat Kawani</p>
        </div>
        <div class="col-md-6">
            <h1>Vision</h1>
            <p>CSC shall be Asia's leading center of excellence for strategic Human Resource (HR) and Organizational Development (OD)</p>
        </div>
    </div>
</div>
@stop