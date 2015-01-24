@extends('layouts.default')

@section('title')
@parent
:: Products
@stop

@section('content')
<button class="btn btn-xl">Create product</button>
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
                <button type="button" class="btn btn-xs my-tbl-btn-view" data-toggle="modal" data-target="#myModal">Modal</button>
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $product->product }}</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
