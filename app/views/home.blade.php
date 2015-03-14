@extends('layouts.default')

@section('title')
@parent
:: Home
@stop

@section('content')

<div class="my-view-header-wrapper" data-spy="affix" data-offset-top="20">
    <div class="container-fluid my-max-width">
        <div class="row my-view-header">
            <div class="col-sm-4">
                <h4>Home</h4>
            </div>
            <div class="col-sm-8 my-view-header-nav">
                <ul class="nav nav-pills navbar-right">
                    <li><a href="#homeLatestOffers" class="btn btn-sm my-view-header-btn">Latest Offers</a></li>
                    <li><a href="#homeSalesRepStats" class="btn btn-sm my-view-header-btn">User Stats</a></li>
                    <li><a href="#homeNewPotential" class="btn btn-sm my-view-header-btn">New Potential</a></li>
                </ul>
            </div>  
        </div>
    </div>
</div>
<div class="my-view-header-wrapper-affix-replacer" data-spy="affix" data-offset-top="20"></div>

@if(Auth::check())
<p>Hello, {{ Auth::user()->username }}.</p>
@else

<div class="my-welocome-page center-block">
    <p>You are not signed in!</p>

    <a class="btn btn-lg btn-warning" href="{{ URL::route('sign-in') }}">Sign in</a>
</div>

@endif  

<div class="">
    <div class="row">
        <div id="homeLatestOffers">
            <h4>
                Latest offers
            </h4>
            <p>1SLKDsj LKDJaldkj lKDJLadk</p>
            <p>2SLKDsj LKDJaldkj lKDJLadk</p>
            <p>3SLKDsj LKDJaldkj lKDJLadk</p>
            <p>4SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
        </div>
    </div>

    <div class="row">
        <div id="homeSalesRepStats">
            <h4>
                Sales Rep Stats
            </h4>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
        </div>
    </div>

    <div class="row">
        <div id="homeNewPotential">
            <h4>
                New potential customers
            </h4>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
            <p>SLKDsj LKDJaldkj lKDJLadk</p>
        </div>
    </div>
</div>
@stop