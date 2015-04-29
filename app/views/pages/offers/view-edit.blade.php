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
        
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        {{ Form::label('myOfferRecipient', 'Customer', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
            {{ Form::text('myOfferRecipient', $recipient->customer, array(
                        'class' => 'form-control', 
                        'readonly' => 'readonly',
                        'name' => 'recipient')) }}
            {{ $errors->first('title', '<p class="help-block">:message</p>') }}
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        {{ Form::label('myOfferEmail', 'Email', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
            {{ Form::email('myOfferEmail', $recipient->email, array(
                        'class' => 'form-control',
                        'name' => 'email')) }}
            {{ $errors->first('title', '<p class="help-block">:message</p>') }}
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Send', array('class' => 'btn btn-md my-btn-save')) }}
            </div>
        </div>
                
                
    {{ Form::close() }}
    

</div>


@stop

