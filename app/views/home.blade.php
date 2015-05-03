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
<!--<div class="my-view-header-wrapper-affix-replacer" data-spy="affix"></div>-->



<div class="container-fluid">
    
    <div class="my-home-container"> <!-- Unused class -->
    
<!--        <div class="row">
            @if(Auth::check())
                <p>Hello, {{ Auth::user()->username }}.</p>
            @else
                <div class="my-welocome-page center-block">
                    <p>You are not signed in!</p>

                    <a class="btn btn-lg btn-warning" href="{{ URL::route('sign-in') }}">Sign in</a>
                </div>
            @endif  
        </div>-->

        <div class="row">
            <div id="homeLatestOffers">
                <h4>
                    Latest offers
                </h4>
                
                <canvas id="myOfferStatsChart" width="auto" height="400"></canvas>
            </div>
        </div>

        <div class="row">
            <div id="homeSalesRepStats">
                <h4>
                    Sales Rep Stats
                </h4>
                
                <canvas id="myUserStatsChart" width="400" height="400"></canvas>
            </div>
        </div>

        <div class="row">
            <div id="homeNewPotential">
                <h4>
                    New contacts for last 30 days 
                </h4>
                
                <table>
                    <thead>
                        <tr>
                            <th>First comunication</th>
                            <th>Customer</th>
                            <th>Manager</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($new_customers as $customer)
                            <tr>
                                <td>{{ date("d M Y", strtotime($customer->created_at)) }}</td>
                                <td>{{ $customer->customer }}</td>
                                <td>{{ $customer->user->name . ' ' . $customer->user->surname }}</td>
                                <td>Identifying needs / offer sent / offer prepeared</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                
                
            </div>
        </div>
        
    </div>
    
</div>
@stop