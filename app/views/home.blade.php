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
                    <li><a href="#homeOfferStats" class="btn btn-sm my-view-header-btn">Offer Stats</a></li>
                    <li><a href="#homeSalesRepStats" class="btn btn-sm my-view-header-btn">User Stats</a></li>
                    <li><a href="#homeNewPotential" class="btn btn-sm my-view-header-btn">New Potential</a></li>
                </ul>
            </div>  
        </div>
    </div>
</div>
<!--<div class="my-view-header-wrapper-affix-replacer" data-spy="affix"></div>-->



<div class="container-fluid">
    
    <div class="my-home-container">

        <div class="row">
            <div class="my-chart-wrapper">
                <div id="homeOfferStats" class="my-home-offer-stats">
                    <h3>Latest offers</h3>
                    <canvas id="myOfferStatsChart"></canvas>
                    <div id="myOfferStatsLegend" class="my-chart-legend"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="my-chart-wrapper">
                <div id="homeSalesRepStats" class="my-home-user-stats">
                    <h3>Sales Rep Stats</h3>
                    <canvas id="myUserStatsChart"></canvas>
                    <div id="myUserStatsLegend" class="my-chart-legend"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="my-chart-wrapper">
                
                <div id="homeNewPotential" class="my-home-user-stats">
                    <h3>New contacts for last 90 days</h3>

                    <table class="table table-small-font table-hover my-table">
                        <thead>
                            <tr>
                                <th>First comunication</th>
                                <th>Customer</th>
                                <th>Contact person</th>
                                <th>Manager</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($new_customers as $customer)
                                <tr>
                                    <td>{{ date("d M Y", strtotime($customer->created_at)) }}</td>
                                    <td>{{ $customer->contact_person }}</td>
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
    
</div>

@include('includes.myChartDataScript')

@stop