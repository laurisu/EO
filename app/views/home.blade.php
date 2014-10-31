@extends('layouts.default')

@section('title')
@parent
:: Home
@stop

@section('content')
    @if(Auth::check())
        <p>Hello, {{ Auth::user()->username }}.</p>
    @else
        <p>You are not signed in!</p>
        
        <a class="btn btn-lg btn-warning" href="{{ URL::route('sign-in') }}">Sign in</a>
        
    @endif  
@stop