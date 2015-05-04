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
                <button class="btn btn-sm my-view-header-btn">{{ HTML::linkRoute('account-create', 'Create account') }}</button>
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

                                        <div class="">
                                            @if(!empty($user->img))
                                            <img src="{{ asset($user->img) }}" alt="" class="img-responsive">
                                            @else
                                            <img src="http://placehold.it/300x400" alt="" class="img-responsive">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-4">

                                        <h4>Contacts</h4>
                                        <p><strong>name: </strong>{{ $user->name }}</p>
                                        <p><strong>surname: </strong>{{ $user->surname }}</p>
                                        <p><strong>username: </strong>{{ $user->username }}</p>
                                        <p><strong>title: </strong>{{ $user->job_title }}</p>
                                        <p><strong>mobile: </strong>{{ $user->phone }}</p>
                                        <p><strong>email: </strong>{{ $user->email }}</p>

                                    </div>
                                    <div class="col-xs-12 col-sm-4">

                                        <h4>Settings</h4>
                                        <p><strong>Permisions: </strong>
                                            @if($user->role==0)
                                                Simple user
                                            @elseif($user->role==2)
                                                User with Admin rights
                                            @endif
                                        </p>
                                        <p><strong>Profile status: </strong>
                                            @if($user->active==1)
                                                Active
                                            @elseif($user->role==0)
                                                Disabled
                                            @endif
                                        </p>

                                    </div> 
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="myUserCustomer{{ $user->id }}">
                                <div class="my-tab-content-container">
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Customer list</h4>
                                        @foreach($user->customers as $customer)
                                        <p>{{ $customer->customer }}</p>
                                        @endforeach
                                    </div>       
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Customer gained</h4>
                                        <br>


                                    </div>       
                                    <div class="col-xs-12 col-sm-4">

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