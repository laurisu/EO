@extends('layouts.default')

@section('title')
@parent
:: Sign in
@stop

@section('content')
<div class="my-pass-form">
    <div class="container">
        <form class="form-signin my-form-signin" role="form" action="{{ URL::route('sign-in-post') }}" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>

            <div class="from-group my-form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" {{ (Input::old('username')) ? ' value="' . e(Input::old('username')) . '"' : '' }} autofocus>
                @if($errors->has('username'))
                {{ $errors->first('username') }}
                @endif
            </div>
            <div class="from-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if($errors->has('password'))
                {{ $errors->first('password') }}
                @endif
            </div>
            <div class="my-login-helpers-container">

                <div class="col-xs-6 remeber-me">
                    <label class="checkbox">
                        <input type="checkbox" name="remember-me" value="remember-me"> Remember me
                    </label>
                </div>

                <div class="col-xs-6 forgot-password">
                    <a class="btn" href="{{ URL::route('forgot-password') }}">Forgot password?</a>
                </div>

            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            {{ Form::token() }}
        </form>
    </div>
</div>
@stop