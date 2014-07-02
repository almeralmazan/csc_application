@extends('layouts.admin-processor')

@section('content')
<div id="fullscreen_bg" class="fullscreen_bg" />

<div class="container container-login">
    {{ Form::open(['url' => 'processor/login', 'class' => 'form-signin', 'id' => 'processor-form']) }}
        <h1 class="form-signin-heading text-muted">
            Processor
        </h1>

        {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus', 'required']) }}
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}

        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign In
        </button>

        <div class="login-error"></div>
    {{ Form::close() }}
</div>
@stop