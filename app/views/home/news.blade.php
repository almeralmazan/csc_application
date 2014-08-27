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
                        <div class="carousel-caption" style="top: 90px;">
                            <p>Children play in a flooded street caused by heavy rains overnight while motorists pass by in Manila on Tuesday. Some classes were suspended after a yellow rain warning was issued in the metropolis due to heavy rains brought by a low pressure area in the Bicol region.</p>
                            <a href="http://www.abs-cbnnews.com/image/nation/08/26/14/flood-anew-metro-after-heavy-rain" target="_blank" class="btn btn-default">Read More</a>
                        </div>
                    </div>
                    <div class="item">
                        {{ HTML::image('img/news-2.jpg') }}
                        <div class="carousel-caption" style="top: 90px;">
                            <p>Justice Secretary Leila De Lima is poured a with a bucket of ice-cold water after accepting the challenge from ABS-CBN anchor Anthony Taberna on Tuesday. The ice bucket challenge has caught on in the Philippines, with personalities from entertainment to sports taking up the cause.</p>
                            <a href="http://www.abs-cbnnews.com/image/nation/08/26/14/secretary-leila-de-lima-takes-ice-bucket-challenge" target="_blank" class="btn btn-default">Read More</a>
                        </div>
                    </div>
                    <div class="item">
                        {{ HTML::image('img/news-3.jpg') }}
                        <div class="carousel-caption" style="top: 90px;">
                            <p>Fifty-three members of the House committee on justice declare 1 of 3 impeachment complaints against President Aquino sufficient in form at the House of Representatives on Tuesday. The solons also found 2 other impeachment complaints sufficient in form.</p>
                            <a href="http://www.abs-cbnnews.com/image/nation/08/26/14/solons-declare-pnoy-impeachment-complaints-sufficient-form" target="_blank" class="btn btn-default">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="news-list">
                    <img src="img/thumb-news-1.jpg" width="60" height="60">
                    <p>{{ Str::limit("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, neque.", 123, ' ...') }}</p>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class="news-list">
                    <img src="img/thumb-news-2.jpg" width="60" height="60">
                    <p>{{ Str::limit("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, neque.", 125, ' ...') }}</p>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class="news-list">
                    <img src="img/thumb-news-3.jpg" width="60" height="60">
                    <p>{{ Str::limit("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, neque.", 125, ' ...') }}</p>
                </li>
            </ul>
        </div>
        <div class="col-md-10 margin-top">
            <h4><strong><a href="http://www.abs-cbnnews.com/nation/08/26/14/give-miriam-chance-bernas-tells-pnoy" target="_blank">Give Miriam a chance, Bernas tells PNoy</a></strong></h4>
            <em>August 26, 2014</em>
            <p class="margin-top">
                MANILA - Constitutionalist Fr. Joaquin Bernas said the proposal to lift the term limit of President Benigno Aquino III is against the spirit of his mother, the late former President Corazon Aquino.
            </p>
        </div>
        <div class="col-md-10 margin-top">
            <h4><strong><a href="http://www.abs-cbnnews.com/nation/08/26/14/palace-akbayan-still-pro-administration" target="_blank">Palace: Akbayan still pro-administration</a></strong></h4>
            <em>August 26, 2014</em>
            <p class="margin-top">
                MANILA - Malacanang said the Aquino administration continues to enjoy the support of Akbayan Party despite an appeal made to President Aquino by the group's representative in the House, Walden Bello, to fire Budget Secretary Butch Abad and Agrarian Reform Secretary Virgilio delos Reyes.
            </p>
        </div>
    </div>
</div>
@stop
