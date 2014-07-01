@extends('layouts.admin')

@section('content')
<div id="fullscreen_bg" class="fullscreen_bg" />

<div class="container container-login">
    <form class="form-signin">
        <h1 class="form-signin-heading text-muted">Admin Login</h1>
        <input type="text" class="form-control" placeholder="Username" required="" autofocus="">
        <input type="password" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign In
        </button>
        <div class="alert alert-danger login-error" role="alert">
            Error login
        </div>
    </form>
</div>
@stop