@extends('layouts.default')

@section('title')
@parent
:: Edit product
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Product editor</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('product-edit') }}" method="post">

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Product name</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="product" 
                    class="form-control" id="inputName"
                    placeholder="Product name" 
                    value="{{ $product->product_name }}" autofocus>
                @if($errors->has('email'))
                {{ $errors->first('product') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-9">
                <textarea 
                    name="description" rows="5"
                    class="form-control" id="description"
                    placeholder="Description">{{ $product->description }}</textarea>
                @if($errors->has('email'))
                {{ $errors->first('description') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="purchase_price" class="col-sm-2 control-label">Purchase price</label>
            <div class="col-sm-3">
                <input 
                    type="text" name="purchase_price" 
                    class="form-control" id="purchase_price"
                    placeholder="Purchase price" 
                    value="{{ $product->purchase_price }}">
                @if($errors->has('email'))
                {{ $errors->first('purchase_price') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="retail_price" class="col-sm-2 control-label">Purchase price</label>
            <div class="col-sm-3">
                <input 
                    type="text" name="retail_price" 
                    class="form-control" id="retail_price"
                    placeholder="Retail_price" 
                    value="{{ $product->retail_price }}">
                @if($errors->has('email'))
                {{ $errors->first('retail_price') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-lg my-btn-save" type="submit">Save</button>
                <button class="btn btn-lg my-btn-delete" type="submit">Delete</button>
                <button class="btn btn-lg my-btn-back" type="submit">Back to products</button>
                {{ Form::token() }}
            </div>
        </div>

    </form>

</div>

@stop