@extends('layouts.default')

@section('title')
@parent
:: Choose customer
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Choose recipient - stage 2 of 3</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('add-recipient', array($offer->id)) }}" method="post">      
        
        <div class="form-group">
            <label for="inputOfferAuthor" class="col-sm-2 control-label">Offer author:</label>
            <div class="col-sm-4">
            {{ Form::text('offer', $offer->author->name . ' ' . $offer->author->surname, array(
                        'class' => 'form-control',
                        'name' => 'offer_author',
                        'id' => 'inputOfferAuthor',
                        'readonly' => 'readonly'
                        )) }}
                @if($errors->has('offer_author'))
                    {{ $errors->first('offer_author') }}
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputOfferId" class="col-sm-2 control-label">Offer ID:</label>
            <div class="col-sm-4">
            {{ Form::text('offer', $offer->id, array(
                        'class' => 'form-control',
                        'name' => 'offer_id',
                        'id' => 'inputOfferId',
                        'readonly' => 'readonly'
                        )) }}
                @if($errors->has('offer_id'))
                    {{ $errors->first('offer_id') }}
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputOfferRecipient" class="col-sm-2 control-label">Customer:</label>
            <div class="col-sm-4">
            {{ Form::select('customers', array('default' => 'Please select...') + $customer_list, 'default', array(
                        'class' => 'form-control',
                        'name' => 'recipient',
                        'id' => 'inputOfferRecipient'
                        )) }}               
                @if($errors->has('recipient'))
                    {{ $errors->first('recipient') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-md my-btn-save" type="submit">
                    <i class="fa fa-floppy-o"></i> Save and continue
                </button>
                <a href="{{{ route('offers-list') }}}" class="btn btn-md my-btn-back">
                    <i class="fa fa-list-alt"></i> Offers list
                </a>
                {{ Form::token() }}           
            </div>
        </div>

    </form>

</div>

@stop


