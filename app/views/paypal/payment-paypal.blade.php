@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 well">
            <form class="form-horizontal" action="{{ URL::to('buy-with-paypal') }}" role="form">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="controlNumber">Control No.</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" required name="controlNumber" placeholder="Control Number">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-12 margin-top text-center">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Pay thru PayPal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop