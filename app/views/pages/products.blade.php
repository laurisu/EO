@extends('layouts.default')

@section('title')
@parent
:: Products
@stop

@section('content')
<table class="table  table-hover my-table">

    <caption>Products list</caption>
    <thead>
        <tr>
            <th>code</th>
            <th>name</th>
            <th>description</th>
            <th>purchase price</th>
            <th>retail price</th>
            <th>discount</th>
            <th>offer price</th>
            <th>options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="col-md-1">{{ $product->product_code }}</td>
            <td class="col-md-2">{{ $product->product }}</td>
            <td class="col-md-3">{{ $product->description }}</td>
            <td class="col-md-1"><i class="fa fa-eur"></i> {{ $product->purchase_price }}</td>
            <td class="col-md-1"><i class="fa fa-eur"></i> {{ $product->retail_price }}</td>
            <td class="col-md-1">%</td>
            <td class="col-md-1">offer</td>
            <td class="col-md-2">
                <button class="btn btn-xs my-tbl-btn-view">{{ HTML::linkRoute('product-view', 'View', array($product->id)) }}</button>
                <button class="btn btn-xs my-tbl-btn-offer">Offer</button>
                <button class="btn btn-xs my-tbl-btn-edit">Edit</button>
                <button class="btn btn-xs my-tbl-btn-delete">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    
    <div class="container">
        <div class="xo-toggle-dropdown">
            <div class="xo-toggle-headding">
                <p>jkahf</p>
            </div>
            <div class="xo-toggle-content is-hidden">
                <p>asjchasjkchk alksjalksajdlksajx ALKDJADLK</p>
            </div>
        </div>
        <div class="xo-toggle-dropdown">
            <div class="xo-toggle-headding">
                <p>jkahf</p>
            </div>
            <div class="xo-toggle-content is-hidden">
                <p>asjchasjkchk alksjalksajdlksajx ALKDJADLK</p>
            </div>
        </div>
    </div>
    
    @stop

</table>
@stop

@section('pagination')
<div>
    {{ $products->links() }}
</div>
@stop
