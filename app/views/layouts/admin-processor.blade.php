<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="icon" type="image/ico" href="{{ URL::to('img/favicon.ico') }}"/>

    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-datetimepicker.min.css', ['media' => 'screen']) }}
    {{ HTML::style('css/admin-processor-style.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{ HTML::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}
    {{ HTML::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}
    <![endif]-->
</head>
<body>

<div class="container content">
    @yield('content')
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/bootstrap-datetimepicker.js') }}
{{ HTML::script('js/dataService.js') }}
{{ HTML::script('js/controllerPage.js') }}
{{ HTML::script('js/script.js') }}
</body>
</html>