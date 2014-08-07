@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10" style="min-height: 500px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well margin-top">
            <form class="form-inline" action="{{ URL::to('buy-with-paypal') }}" role="form">
                <div class="form-group">
                    <input type="text" class="form-control phoneInput" name="controlNumber" maxlength="7" placeholder="Type Control Number" style="width: 235px;">
                </div>
                <button type="submit" class="btn btn-primary">Pay thru PayPal/CreditCard</button>
            </form>
        </div>
    </div>
    @if (Session::has('message'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3 alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>
    </div>
    @endif
</div>
@stop