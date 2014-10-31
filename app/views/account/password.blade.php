@extends('layouts.default')

<!--@section('title')
@parent
:: Sign in
@stop-->

@section('content')

<div class="container">

    <form class="form" role="form" action="{{ URL::route('change-password-post') }}" method="post">
        <h2 class="form-heading">Change password</h2>

        <input type="password" name="old_password" class="form-control" placeholder="Old password" autofocus>
            @if($errors->has('old_password'))
                {{ $errors->first('old_password') }}
            @endif

        <input type="password" name="password" class="form-control" placeholder="New password">
            @if($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        
        <input type="password" name="password_again" class="form-control" placeholder="New password again">
            @if($errors->has('password_again'))
                {{ $errors->first('password_again') }}
            @endif

        <button class="btn btn-lg btn-primary btn-block" type="submit">Change password</button>
        {{ Form::token() }}
    </form>

</div>

@stop