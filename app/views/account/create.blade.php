@extends('layouts.default')

@section('content')
<form action="{{ URL::route('account-create-post') }}" method="post">
    
    <input type="text" name="email" class="form-control" placeholder="Email address"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }} autofocus>
    @if($errors->has('email'))
        {{ $errors->first('email') }}
    @endif  
    
    <input type="text" name="username" class="form-control" placeholder="Username" {{ (Input::old('username')) ? ' value="' . e(Input::old('username')) . '"' : '' }}>
    @if($errors->has('username'))
        {{ $errors->first('username') }}
    @endif
    
    <input type="password" name="password" class="form-control" placeholder="Password" >
    @if($errors->has('password'))
        {{ $errors->first('password') }}
    @endif
    
    <input type="password" name="password_again" class="form-control" placeholder="Repeat password" >
    @if($errors->has('password_again'))
        {{ $errors->first('password_again') }}
    @endif
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Create account</button>
    {{ Form::token() }}
    
</form>
@stop