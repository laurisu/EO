@extends('layouts.default')

@section('title')
@parent
:: Home
@stop

@section('content')

<div class="my-view-header-wrapper">
    <div class="row my-view-header">
        <div class="col-sm-4">
            <h4>Home</h4>
        </div>
        <div class="col-sm-8 text-right">
            <button class="btn btn-sm my-view-header-btn">#id</button>
            <button class="btn btn-sm my-view-header-btn">#id</button>
            <button class="btn btn-sm my-view-header-btn">#id</button>
        </div>  
    </div>
</div>

    @if(Auth::check())
        <p>Hello, {{ Auth::user()->username }}.</p>
    @else
    
    <div class="my-welocome-page center-block">
        <p>You are not signed in!</p>
        
        <a class="btn btn-lg btn-warning" href="{{ URL::route('sign-in') }}">Sign in</a>
    </div>
        
    @endif  
@stop