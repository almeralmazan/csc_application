@extends('layouts.main')

@section('side-nav')
    @include('layouts.partials.header-nav')
@stop

@section('content')
<div class="col-md-10" style="">
    <div class="row">
        <div class="col-md-8">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        {{ HTML::image('img/news-1.jpg') }}
                        <div class="carousel-caption">
                            <p>Civil Service Commission (CSC) Chairman Francisco T. Duque III disclosed that 67 government offices failed the frontline service survey in 2013.The evaluation of frontline services of government ..</p>
                            <a href="http://web.csc.gov.ph/cscsite2/slider/12-csc-partners-with-anti-corruption-coalition-to-combat-red-tape" class="btn btn-default">Read More</a>
                        </div>
                    </div>
                    <div class="item">
                        {{ HTML::image('img/news-2.jpg') }}
                        <div class="carousel-caption">
                            <p>The Civil Service Commission (CSC) invites government choral groups to participate in the Government Choral Competition.“The competition aims to showcase the musical creativity of state workers,</p>
                            <a href="http://web.csc.gov.ph/cscsite2/slider/349-gov%E2%80%99t-contact-center-now-accepts-reports" class="btn btn-default">Read More</a>
                        </div>
                    </div>
                    <div class="item">
                        {{ HTML::image('img/news-3.jpg') }}
                        <div class="carousel-caption">
                            <p>The Contact Center ng Bayan (CCB), the government’s central helpline against red tape, is expanding to accommodate complaints on extortion (kotong)and bribery (suhol) from micro, small, and medium ...</p>
                            <a href="http://web.csc.gov.ph/cscsite2/slider/12-csc-partners-with-anti-corruption-coalition-to-combat-red-tape" class="btn btn-default">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="news-list">
                    <img src="img/thumb-news-1.jpg" width="60" height="60">
                    <p>{{ Str::limit("Civil Service Commission (CSC) Chairman Francisco T.
                                Duque III disclosed that 67 government offices failed the
                                frontline service survey in 2013.The evaluation of frontline
                                services of government", 123, ' ...') }}</p>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class="news-list">
                    <img src="img/thumb-news-2.jpg" width="60" height="60">
                    <p>{{ Str::limit("The Civil Service Commission (CSC) invites government
                                    choral groups to participate in the Government Choral
                                    Competition.“The competition aims to showcase the musical
                                    creativity of state workers", 125, ' ...') }}</p>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class="news-list">
                    <img src="img/thumb-news-3.jpg" width="60" height="60">
                    <p>{{ Str::limit("The Contact Center ng Bayan (CCB), the government’s central
                                        helpline against red tape, is expanding to accommodate
                                        complaints on extortion (kotong)and bribery (suhol) from
                                        micro, small, and medium", 125, ' ...') }}</p>
                </li>
            </ul>
        </div>
        <div class="col-md-10 margin-top">
            <h4><strong><a href="http://web.csc.gov.ph/cscsite2/new-updates/352-emergency-leave-available-to-state-workers-affected-by-typhoons,-natural-disasters">Emergency leave available to state workers affected by typhoons, natural disasters</a></strong></h4>
            <em>July 24, 2014</em>
            <p class="margin-top">
                "Civil servants may avail of the special emergency leave,” said Civil Service Commission (CSC) Chairman Francisco T. Duque III in light of the recent typhoon Glenda which left seven provinces under state of calamity.
            </p>
            <p>
                CSC Resolution No. 1200289 issued on Feb. 8, 2012 grants a five-day special emergency leave to government workers directly affected by natural disasters, specifically to those who are stranded in affected areas, suffering from disease/illness caused by natural calamity/disaster, taking care of immediate family members affected by natural calamity/disaster, or in need of urgent repair and clean-up of damaged houses.
            </p>
        </div>
        <div class="col-md-10 margin-top">
            <h4><strong><a href="http://web.csc.gov.ph/cscsite2/new-updates/351-sing-and-run-for-the-lingkod-bayani">Sing and run for the lingkod bayani</a></strong></h4>
            <em>July 18, 2014</em>
            <p class="margin-top">
                The 114th Philippine Civil Service Anniversary (PCSA) with the theme “Tapat na Serbisyo Alay Ko Dahil Lingkod Bayani Ako” kicks off with a fun run on Sept. 6, 5:00 a.m. at the SM Mall of Asia Complex in Pasay City.</p>
            <p>The Civil Service Commission (CSC) opened registration to the R.A.C.E. to Serve Fun Run.</p>
            <p>Now on its fourth year, the fun run is open to all Filipino citizens 18 years old and above. Participants below 18 years old will be required to secure permission from their parents or guardians.</p>
            <p>Registration fee is PHP150 inclusive of race bib.</p>
        </div>
    </div>
</div>
@stop
