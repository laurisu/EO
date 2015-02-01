@extends('layouts.default')

@section('title')
@parent
:: Products list
@stop

@section('content')

<div class="row my-table-headding">
    <div class="col-sm-6">
        <h4>Product list</h4>
    </div>
    <div class="col-sm-6"><button class="btn btn-sm my-btn-create">{{ HTML::linkRoute('product-create', 'Add product') }}</button></div>  
</div>

<table class="table table-hover my-table">

    <caption>Products list</caption>
    <thead>
        <tr>
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
            <td class="col-md-2">{{ $product->product_name }}</td>
            <td class="col-md-4 my-td-ellipsis" style="">
                <div>{{ $product->description }}</div>          
            </td>
            <td class="col-md-2"><i class="fa fa-eur"></i> {{ $product->purchase_price }}</td>
            <td class="col-md-2"><i class="fa fa-eur"></i> {{ $product->retail_price }}</td>
            <td class="col-md-2">
                <button class="btn btn-xs my-tbl-btn-view">{{ HTML::linkRoute('product-view', 'View', array($product->id)) }}</button>
                <button type="button" href="{{ route('product-view', array($product->id)) }}" class="btn btn-xs my-tbl-btn-view open-product-view"  data-target="#myModal">Modal</button>
                <button class="btn btn-xs my-tbl-btn-offer">Add to offer</button>
                <button class="btn btn-xs my-tbl-btn-edit">{{ HTML::linkRoute('product-edit', 'Edit', array($product->id)) }}</button>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('pagination')
<div>
    {{ $products->links() }}
</div>
@stop
