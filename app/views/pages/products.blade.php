@extends('layouts.default')

@section('title')
@parent
:: Products
@stop

@section('content')

<div class="container-fluid my-main-container">
    <table class="table table-condensed table-hover">
        <caption>Products list</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>code</th>
                <th>name</th>
                <th>description</th>
                <th>purchase price</th>
                <th>retail price</th>
                <th>options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product }}</td>
                    <td>{{ $product->description }}</td>
                    <td><i class="fa fa-eur"></i> {{ $product->purchase_price }}</td>
                    <td><i class="fa fa-eur"></i> {{ $product->retail_price }}</td>
                    <td>
                        <button class="btn btn-xs">{{ HTML::linkRoute('product-view', 'View', array($product->id)) }}</button>
                        <button class="btn btn-xs">Offer</button>
                        <button class="btn btn-xs">Remove</button>
                    </td>
                </tr>
            @endforeach
            
            {{ $products->links() }}

            <tr>
                <td>1</td>
                <td>123</td>
                <td>Table</td>
                <td>brown table</td>
                <td><i class="fa fa-eur"></i> 5</td>
                <td><i class="fa fa-eur"></i> 7</td>
                <td>
                    <button class="btn btn-xs">Offer</button>
                    <button class="btn btn-xs">Remove</button>
                </td>
            </tr>

        </tbody>
    </table>
</div>

@stop