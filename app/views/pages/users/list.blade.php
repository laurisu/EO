@extends('layouts.default')

@section('content')

<a href="{{ URL::route('account-create') }}">Crate user</a>
Users list (Admin only)<br>   
Information about user's<br>
What offers and how many offers they have sent and to whom.<br> 

@foreach($users as $user)

<div class="row">
    <div class="col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
        <div class="my-user-profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h3>{{ $user->name }} {{ $user->surname }} <br><small>(username: {{ $user->username }})</small></h3>
                    <p><strong>email: </strong> {{ $user->email }}</p>
                    <p><strong>title: </strong> </p>
                    <p><strong>mobile: </strong> </p>
                    <p><strong>permisions: </strong> </p>
                    <p><strong>status: </strong> </p>
                    <p><strong>manager code: </strong> </p>
                    <p><strong>manager code: </strong> </p>
                    <p><strong>manager code: </strong> </p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center hidden-xs">
                    <img src="http://placehold.it/300x400" alt="" class="img-circle img-responsive">
                </div>
            </div>            
            <div class="col-xs-12 my-divider text-center">
                <div class="col-xs-12 col-sm-4 my-emphasis">
                    <h2><strong>128</strong></h2>                    
                    <p><small>Offers total</small></p>
                    <button class="btn btn-success btn-block"><i class="fa fa-briefcase"></i> Customers </button>
                </div>
                <div class="col-xs-12 col-sm-4 my-emphasis">
                    <h2><strong>12</strong></h2>                    
                    <p><small>Offers last 30 days</small></p>
                    <button class="btn btn-info btn-block"><i class="fa fa-archive"></i> Offers </button>
                </div>
                <div class="col-xs-12 col-sm-4 my-emphasis">
                    <h2><strong>22</strong></h2>                    
                    <p><small>Customers gained</small></p>
                    <div class="btn-group dropup btn-block">
                        <button type="button" class="btn btn-primary"><i class="fa fa-cog"></i> Options </button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu text-left" role="menu">
                            <li><a href="#"><i class="fa fa-envelope"></i> Send an email</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-user-secret"></i> Change permisions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>                 
    </div>
</div>

@endforeach

@stop