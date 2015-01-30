@extends('layouts.default')

@section('content')

<a href="{{ URL::route('account-create') }}">Crate user</a>
Users list (Admin only)<br>   
Information about user's<br>
What offers and how many offers they have sent and to whom.<br> 

@foreach($users as $user)
    
   



<div class="row">
    <div class="my-user-profile">
        
        <div class="col-xs-12">
            <div class="my-usr-head">
                {{ $user->name }} {{ $user->surname }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-3">
            <div class="my-usr-img">
                <div class="">
                    <img class="img-responsive" src="http://placehold.it/300x400">
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-9">
            <div class="my-usr-info">
                <div class="">
                    <label class="col-md-3">username</label>
                    <div class="col-md-9"><p>{{ $user->username }}</p></div>
                    <label class="col-md-3">email</label>
                    <div class="col-md-9"><p>{{ $user->email }}</p></div>
                    <label class="col-md-3">role</label>
                    <div class="col-md-9"><p>{{ $user->role }}</p></div>
                    <label class="col-md-3">active</label>
                    <div class="col-md-9"><p>{{ $user->active }}</p></div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12">
            <div class="my-usr-stats">
                
            </div>
        </div> 
        
    </div>
</div>
@endforeach

@stop