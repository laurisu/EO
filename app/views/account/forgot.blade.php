@extends('layouts.default')

@section('content')
<div class="container">

    <form class="form" role="form" action="{{ URL::route('forgot-password-post') }}" method="post">
        <h2 class="form-heading">Password recovery</h2>

        <input type="email" name="email" class="form-control" placeholder="Email" autofocus>
        @if($errors->has('email'))
        {{ $errors->first('email') }}
        @endif

        <button class="btn btn-lg btn-primary btn-block" type="submit">Recover</button>
        
        {{ Form::token() }}
    </form>

</div>
@stop