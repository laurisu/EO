@extends('layouts.default')

@section('title')
@parent
:: My profile
@stop

@section('content')

<div class="my-user-profile">
    
    <div class="row">
        <div class="col-sm-12">
            <h1>{{ e($user->username) }}</h1>
            <button type="button" class="btn btn-success">Change password</button>
            <button type="button" class="btn btn-info">Edit profile</button>
            <button type="button" class="btn btn-info">Change image</button>
            <br>
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item my-list-group-heading" contenteditable="false">Profile <span class="pull-right"><i class="fa fa-info-circle fa-1x"></i></span></li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><strong class="">Joined</strong></span> {{ e($user->created_at->toFormattedDateString()) }}</li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><strong class="">Last seen</strong></span> {{ e($user->updated_at->diffForHumans()) }}</li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><strong class="">Username</strong></span> {{ e($user->username) }}</li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><strong class="">Role: </strong></span> 
                    @if ($user->status = 0)
                        Simple user
                    @elseif ($user->status = 2)
                        Admin
                    @endif
                </li>
            </ul>

            <ul class="list-group">
                <li class="list-group-item my-list-group-heading">Offer activity <span class="pull-right"><i class="fa fa-dashboard fa-1x"></i></span></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Unfinished</strong></span> 78</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Sent</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Accepted</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Rejected</strong></span> 37</li>
            </ul>
            
        </div>
        <!--/col-3-->
        <div class="col-sm-9" contenteditable="false" style="">
            <div class="panel panel-default">
                <div class="panel-heading">Contact information <span class="pull-right"><i class="fa fa-user fa-1x"></i></span></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Name: </strong><span class="pull-right">{{ e($user->name) }}</span></li>
                                <li class="list-group-item"><strong>Surname: </strong><span class="pull-right">{{ e($user->surname) }}</span></li>
                                <li class="list-group-item"><strong>Job title: </strong><span class="pull-right">{{ e($user->job_title) }}</span></li>
                                <li class="list-group-item"><strong>Phone: </strong><span class="pull-right">{{ e($user->phone) }}</span></li>
                                <li class="list-group-item"><strong>Email: </strong><span class="pull-right">{{ $user->email }}</span></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                @if(!empty($user->img))
                                <img title="profile image" src="{{ asset($user->img) }}" alt="Profile image" class="img-responsive">
                                @else
                                <img title="profile image" src="http://placehold.it/300x400" alt="Profile image" class="img-responsive">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">My protfolio <span class="pull-right"><i class="fa fa-briefcase fa-1x"></i></span></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="http://lorempixel.com/600/200/business">
                                <div class="caption">
                                    <h3>My customers</h3>
                                    @foreach ($user->customers as $customer)
                                        <p>{{ $customer->customer }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="http://lorempixel.com/600/200/technics">
                                <div class="caption">
                                    <h3>All offers</h3>
                                    @foreach ($user->offers as $offer)
                                        @if($offer->customer_id != NULL)
                                            <p>{{ $offer->customer['customer'] . ' <span class="pull-right">' . $offer->updated_at->diffForHumans() . '</span>'  }}</p>
                                        @elseif($offer->customer_id == NULL)
                                            <p>{{ '<i style="color:red">not asigned</i> <span class="pull-right">' . $offer->updated_at->diffForHumans() . '</span>'  }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="http://lorempixel.com/600/200/nightlife">
                                <div class="caption">
                                    <h3>Accepted offers</h3>
                                    @foreach ($user->offers as $offer)
                                        @if($offer->status == 3)
                                        <p>{{ $offer->customer['customer'] . ' <span class="pull-right">' . $offer->updated_at->diffForHumans() . '</span>'  }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Some heading</div>
                <div class="panel-body"> Some other information</div>
            </div></div>

    </div>
   
</div>
@stop