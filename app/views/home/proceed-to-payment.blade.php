@extends('layouts.main')

@section('content')
<div class="container margin-top ticket-container">
    <div class="row">
        <div class="row hidden-print">
            <div class="col-md-8 col-md-offset-2">
                <button class="btn btn-default" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Print</button>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 margin-top" style="border: 1px solid #eee; margin-bottom: 50px;">
            <div class="row">
                <div class="col-md-12 text-right">
                    <h1>Application # 000001</h1>
                    <hr>
                </div>
                <div class="col-xs-6">
                    <ul class="list-unstyled">
                        <li><h4><strong>Exam details:</strong></h4></li>
                        <li><h4>Sub Professional</h4></li>
                        <li><h4>CSC-Office Taguig City</h4></li>
                        <li><h4>10:00 AM - 12:00 PM</h4></li>
                        <li><h4>July 23, 2014</h4></li>
                    </ul>
                </div>
                <div class="col-xs-6 text-right">
                    <ul class="list-unstyled">
                        <li><h4><strong>Billed to:</strong></h4></li>
                        <li><h4>Jun Mar Farajdo</h4></li>
                        <li><h4>July 31, 2014</h4></li>
                    </ul>
                </div>
                <div class="col-xs-6 text-right">
                    <ul class="list-unstyled">
                        <li><h4><strong>Total Payment:</strong></h4></li>
                        <li><h4>&#x20B1;500</h4></li>
                    </ul>
                </div>
            </div>
            <div class="row margin-top">
                <div class="col-md-12" style="margin-bottom: 50px; border-top: 1px dashed black;">
                    <div class="row margin-top">
                        <div class="col-xs-3">
                            <img src="img/2x2.jpg" alt="">
                        </div>
                        <div class="col-md-8">
                            <ul class="list-unstyled">
                                <li><h4>Name: <strong> Jenary S. Madia</strong></h4></li>
                                <li><h4>Sex: <strong> Male</strong></h4></li>
                                <li><h4>Date of Birth: <strong> January 1, 1991</strong></h4></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-top text-center">
                            <p>
                                <strong>WARNING:</strong>
                                The Civil Services Commission uses highly reliable system to detect cheats. Any form of cheating in any Civil Services Examination shall be considered a violation of <strong>Republic Act No. 9416 (Anti-Cheating Law),</strong> and any person found guilty shall be administratively and criminally liable
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop