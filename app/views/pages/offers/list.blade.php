@extends('layouts.default')

@section('title')
@parent
:: Offers
@stop

@section('content')
<div class="container">
    <div class="offer-container">
         <h1>Here goes the offers list</h1>

         @foreach($offers as $offer)
            
                <ul>
                    <li>{{ $offer->id }}</li>
                    <li>{{ $offer->author->name }}</li>
                    <li>{{ $offer->receiver->customer }}</li>
                    <li>{{ $offer->status }}</li>

                </ul>
            
         @endforeach

    </div>
   
</div>

@stop