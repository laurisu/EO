@extends('layouts.default')

@section('title')
@parent
:: Forgot password
@stop

@section('content')
<div class="my-pass-form">
    <div class="container">

        <form class="form my-pass-recover" role="form" action="{{ URL::route('forgot-password-post') }}" method="post">
            <h2 class="form-heading">Password recovery</h2>

            <div class="my-form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" autofocus>
                @if($errors->has('email'))
                {{ $errors->first('email') }}
                @endif
            </div>

            <button class="btn btn-md btn-primary btn-block" type="submit">Recover</button>

            {{ Form::token() }}
        </form>

    </div>
</div>
@stop