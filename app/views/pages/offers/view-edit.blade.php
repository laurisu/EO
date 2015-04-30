@extends('layouts.default')

@section('title')
@parent
:: Offer
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Offer view</h4>
    </div>

    
    {{ Form::open(array('route' => array('send-offer', $offer->id), 'class' => 'form-horizontal', 'method' => 'post')) }}
        
        <div class="form-group{{ $errors->has('recipient') ? ' has-error' : '' }}">
        {{ Form::label('myOfferRecipient', 'Customer', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
            {{ Form::text('myOfferRecipient', $recipient->customer, array(
                        'class' => 'form-control', 
                        'readonly' => 'readonly',
                        'name' => 'recipient')) }}
            {{ $errors->first('recipient', '<p class="help-block">:message</p>') }}
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
        {{ Form::label('myOfferContact', 'Contact', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
            {{ Form::email('myOfferContact', $recipient->contact_person, array(
                        'class' => 'form-control',
                        'name' => 'contact_person')) }}
            {{ $errors->first('contact_person', '<p class="help-block">:message</p>') }}
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {{ Form::label('myOfferEmail', 'Email', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
            {{ Form::email('myOfferEmail', $recipient->email, array(
                        'class' => 'form-control',
                        'name' => 'email')) }}
            {{ $errors->first('email', '<p class="help-block">:message</p>') }}
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
        {{ Form::label('myOfferUser', 'User', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
            {{ Form::email('myOfferUser', $user->username, array(
                        'class' => 'form-control',
                        'name' => 'user')) }}
            {{ $errors->first('user', '<p class="help-block">:message</p>') }}
            </div>
        </div>
    
        <p>Offered products</p>
        <ul>
        
        </ul>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Send', array('class' => 'btn btn-md my-btn-save')) }}
            </div>
        </div>
                
                
    {{ Form::close() }}
    

</div>


@stop

