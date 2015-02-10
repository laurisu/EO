@extends('layouts.default')

@section('title')
@parent
:: Products
@stop

@section('content')

<div class="my-heading-wrapper">
    <div class="row my-table-headding">
        <div class="">

        </div>
        <div class="col-sm-6">
            <h4>Products</h4>
        </div>
        <div class="col-sm-6"></div>  

        <button class="btn my-collapse-btn" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
            Options
        </button>
    </div>
</div>


<div class="collapse" id="collapseFilters">
    <div class="well my-well">
        <div class="container my-well-container">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="input-group"> 
                    <span class="input-group-addon">Filter</span>
                    <input id="filter" type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <button class="btn btn-sm my-btn-create">{{ HTML::linkRoute('product-create', 'Add product') }}</button>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover my-table">

    <caption>Products list</caption>
    <thead>
        <tr>
            <th>name</th>
            <th class="hidden-sm hidden-xs">description</th>
            <th class="hidden-sm hidden-xs">purchase price</th>
            <th>retail price</th>
            <th>discount</th>
            <th>profit</th>
            <th>offer price</th>
            <th>options</th>
        </tr>
    </thead>
    <tbody class="searchable">

        @foreach($products as $product)
        <tr>
            <td class="col-md-2">{{ $product->product_name }}</td>
            <td class="col-md-3 hidden-sm hidden-xs my-td-ellipsis" style="">
                <div>{{ $product->description }}</div></td>
            <td class="col-md-1 hidden-sm hidden-xs">
                <i class="fa fa-eur"></i> {{ $product->purchase_price }}</td>
            <td class="col-md-1">
                <i class="fa fa-eur"></i> {{ $product->retail_price }}</td>
            <td class="col-md-1">
                20 %</td>
            <td class="col-md-1">
                <i class="fa fa-eur"></i> </td>
            <td class="col-md-1">
                <i class="fa fa-eur"></i> </td>
            <td class="col-md-2">
                <button type="button" href="{{ route('product-view', array($product->id)) }}" class="btn btn-xs my-tbl-btn-view open-product-view"  data-target="#myModal"><i class="fa fa-eye"></i> View</button>
                <button class="btn btn-xs my-tbl-btn-offer">Add to offer</button>
                <button class="btn btn-xs my-tbl-btn-edit"><i class="fa fa-pencil"></i> {{ HTML::linkRoute('product-edit', 'Edit', array($product->id)) }}</button></td>
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
