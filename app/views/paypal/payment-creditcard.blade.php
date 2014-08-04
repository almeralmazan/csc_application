@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 well">
            <form class="form-horizontal" action="{{ URL::to('buy-with-creditcard') }}" role="form">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="controlNumber">Control No.</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" required name="controlNumber" placeholder="Control Number">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" required name="firstName" placeholder="First name" style="border-radius: 5px 0 0 0; width:183px; float:left">
                        <input type="text" class="form-control" required name="lastName" placeholder="Last name" style="border-radius: 0 5px 0 0; width:183px; float:left">
                        <input type="text" class="form-control" required name="number" placeholder="Card Number" style="border-radius: 0;">
                        <input type="text" class="form-control" required name="expiryMonth" placeholder="MM" style="border-radius: 0px 0 0 5px; width:143px; float:left">
                        <input type="text" class="form-control" required name="expiryYear" placeholder="YYYY" style="border-radius: 0; width:143px; float:left">
                        <input type="text" class="form-control" required name="cvv" placeholder="C V V" style="border-radius: 0 0px 5px 0; width:80px; float:left">
                    </div>
                    <div class="col-sm-12 margin-top text-center">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Pay with credit card</button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop