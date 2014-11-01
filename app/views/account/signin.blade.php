@extends('layouts.default')

@section('title')
@parent
:: Sign in
@stop

@section('content')

<div class="container">

    <form class="form-signin" role="form" action="{{ URL::route('sign-in-post') }}" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>

        <input type="text" name="username" class="form-control" placeholder="Username" {{ (Input::old('username')) ? ' value="' . e(Input::old('username')) . '"' : '' }} autofocus>
            @if($errors->has('username'))
            {{ $errors->first('username') }}
            @endif

        <input type="password" name="password" class="form-control" placeholder="Password">
            @if($errors->has('password'))
            {{ $errors->first('password') }}
            @endif

        <label class="checkbox">
            <input type="checkbox" name="remember-me" value="remember-me"> Remember me
        </label>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <a class="btn btn-lg btn-warning btn-block" href="{{ URL::route('forgot-password') }}">Forgot Password</a>
        {{ Form::token() }}
    </form>

</div>

@stop