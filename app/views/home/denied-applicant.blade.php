@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 well margin-top">
            <form class="form-inline" role="form">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Control Number" style="width: 280px;">
                </div>
                <button type="submit" class="btn btn-primary">Proceed</button>
            </form>
        </div>
    </div>
</div>
@stop