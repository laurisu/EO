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
            {{ Form::text('myOfferContact', $recipient->contact_person, array(
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
            {{ Form::text('myOfferUser', $offer->user->username, array(
                        'class' => 'form-control',
                        'name' => 'user')) }}
            {{ $errors->first('user', '<p class="help-block">:message</p>') }}
            </div>
        </div>
    
        <div class="form-group">
            <label id="" class="col-sm-2 control-label">Offered products</label>
            <div class="col-sm-10 col-xs-12">
                <table class="table table-small-font table-hover my-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->product->id }}</td>
                            <td class="col-xs-2">{{ $item->product->product_name }}</td>
                            <td>{{ $item->product->retail_price }}</td>
                            <td>{{ $item->product->description }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
    <hr>    
    
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-md my-btn-save" type="submit">
                    <i class="fa fa-envelope-o"></i> Send
                </button>
                <a href="{{{ route('offers-list') }}}" class="btn btn-md my-btn-back">
                    <i class="fa fa-list-alt"></i> Back to offers
                </a>
            </div>
        </div>            
                
    {{ Form::close() }}  

</div>

@stop