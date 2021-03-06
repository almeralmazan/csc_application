<!DOCTYPE html>
<html lang="en" ng-app="HomeApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="icon" type="image/ico" href="{{ URL::to('img/favicon.ico') }}"/>

    <style> .required { color: red; } </style>
    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-datetimepicker.min.css', ['media' => 'screen']) }}
    {{ HTML::style('css/style.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{ HTML::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}
    {{ HTML::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}
    <![endif]-->
</head>
<body>

    <div class="container content">
        <div class="row">
            @yield('side-nav')


            @yield('content')

            @include('layouts.partials.footer')
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('js/jquery.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/bootstrap-datetimepicker.js') }}
{{ HTML::script('js/angular.min.js') }}
{{ HTML::script('js/moment.min.js') }}
{{ HTML::script('js/dataService.js') }}
{{ HTML::script('js/controllerPage.js') }}
{{ HTML::script('js/script.js') }}
</body>
</html>