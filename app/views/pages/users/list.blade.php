@extends('layouts.default')

@section('title')
@parent
:: Users
@stop

@section('content')

<div class="my-view-header-wrapper" data-spy="affix" data-offset-top="20">
    <div class="container-fluid my-max-width">
        <div class="row my-view-header">
            <div class="col-sm-4">
                <h4>Users</h4>
            </div>
            <div class="col-sm-8 text-right">
                <a class="btn btn-sm my-view-header-btn" href="{{ URL::route('account-create') }}">Create account</a>
            </div>  
        </div>
    </div>
</div>
<div class="my-view-header-wrapper-affix-replacer" data-spy="affix" data-offset-top="20"></div>

<div class="my-user-list-accordion">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        @foreach($users as $user)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading{{ $user->id }}">
                <h4 class="panel-title">
                    <a 
                        data-toggle="collapse" 
                        data-parent="#accordion" 
                        href="#collapse{{ $user->id }}" 
                        aria-expanded="true" 
                        aria-controls="collapse{{ $user->id }}">
                        {{ $user->name . ' ' . $user->surname }}
                    </a>
                </h4>
            </div>
            <div 
                id="collapse{{ $user->id }}" 
                class="panel-collapse collapse" 
                role="tabpanel" 
                aria-labelledby="heading{{ $user->id }}">         
                
                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a 
                                    href="#myUserProfile{{ $user->id }}" 
                                    aria-controls="myUserProfile{{ $user->id }}" 
                                    role="tab" data-toggle="tab">
                                    <i class="fa fa-user"></i> Profile
                                </a>
                            </li>
                            <li role="presentation">
                                <a 
                                    href="#myUserCustomer{{ $user->id }}" 
                                    aria-controls="myUserCustomer{{ $user->id }}" 
                                    role="tab" data-toggle="tab">
                                    <i class="fa fa-briefcase"></i> Customers
                                </a>
                            </li>
                            <li role="presentation">
                                <a 
                                    href="#myUserStats{{ $user->id }}" 
                                    aria-controls="myUserStats{{ $user->id }}" 
                                    role="tab" data-toggle="tab">
                                    <i class="fa fa-bar-chart"></i> Statistics
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="myUserProfile{{ $user->id }}">   
                                <div class="my-tab-content-container">
                                    <div class="col-xs-12 col-sm-4">

                                        <div class="thumbnail">
                                            @if(!empty($user->img))
                                            <img src="{{ asset($user->img) }}" alt="Profile image" class="img-responsive">
                                            @else
                                            <img src="http://placehold.it/300x400" alt="Profile image" class="img-responsive">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-heading">Contacts</li>
                                            <li class="list-group-item text-right">
                                                {{ $user->name }}
                                                <span class="pull-left">
                                                    <strong>name:</strong>
                                                </span>
                                            </li>
                                            <li class="list-group-item text-right">
                                                {{ $user->surname }}
                                                <span class="pull-left">
                                                    <strong>surname:</strong>
                                                </span>
                                            </li>
                                            <li class="list-group-item text-right">
                                                {{ $user->username }}
                                                <span class="pull-left">
                                                    <strong>username:</strong>
                                                </span>
                                            </li>
                                            <li class="list-group-item text-right">
                                                {{ $user->job_title }}
                                                <span class="pull-left">
                                                    <strong>title:</strong>
                                                </span>
                                            </li>
                                            <li class="list-group-item text-right">
                                                <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                                                <span class="pull-left">
                                                    <strong>mobile:</strong>
                                                </span>
                                            </li>
                                            <li class="list-group-item text-right">
                                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                <span class="pull-left">
                                                    <strong>email:</strong>
                                                </span>
                                            </li>
                                            <li class="list-group-item text-right">
                                                {{ Carbon::now()
                                                    ->createFromTimeStamp(strtotime($user->last_signin))
                                                    ->diffForHumans() }}
                                                <span class="pull-left">
                                                    <strong>last seen:</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-heading">Settings</li>
                                            <li class="list-group-item text-right">
                                                @if($user->role==0)
                                                    Simple user
                                                @elseif($user->role==2)
                                                    User with Admin rights
                                                @endif
                                                <span class="pull-left">
                                                    <strong>Permisions:</strong>
                                                </span>
                                            </li>
                                            <li class="list-group-item text-right">
                                                @if($user->active==1)
                                                    Active
                                                @elseif($user->role==0)
                                                    Disabled
                                                @endif
                                                <span class="pull-left">
                                                    <strong>Status:</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-heading">Options</li>
                                            <li class="list-group-item text-right">
                                                <a
                                                    href="{{ route('account-edit', array($user->id)) }}"
                                                    class="btn btn-xs my-btn-save">
                                                    Edit <i class="fa fa-pencil"></i>
                                                </a>
                                                <span class="pull-left">
                                                    <strong>Edit account information:</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        
                                    </div> 
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="myUserCustomer{{ $user->id }}">
                                <div class="my-tab-content-container">
                                    <div class="col-xs-12 col-sm-4">
                                        
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-heading">Customer list</li>
                                            @foreach($user->customers as $customer)
                                            <li class="list-group-item">{{ $customer->customer }}</li>
                                            @endforeach
                                        </ul>
                                        
                                    </div>       
                                    <div class="col-xs-12 col-sm-4">
                                        
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-heading">Customer list</li>
                                            @foreach($user->customers as $customer)
                                            <li class="list-group-item">{{ $customer->customer }}</li>
                                            @endforeach
                                        </ul>

                                    </div>       
                                    <div class="col-xs-12 col-sm-4">
                                        
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-heading">Customer list</li>
                                            @foreach($user->customers as $customer)
                                            <li class="list-group-item">{{ $customer->customer }}</li>
                                            @endforeach
                                        </ul>
                                        
                                    </div>       
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="myUserStats{{ $user->id }}">
                                <div class="my-tab-content-container">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@stop