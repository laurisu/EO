@extends('layouts.default')

@section('title')
@parent
:: Create product
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Product creator</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('product-create-post') }}" method="post">

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Product name</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="product_name"
                    class="form-control" id="inputName"
                    placeholder="name" 
                    {{ (Input::old('product_name')) ? ' value="' . e(Input::old('product_name')) . '"' : '' }} 
                    autofocus>
                @if($errors->has('product_name'))
                {{ $errors->first('product_name') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-9">
                <textarea 
                    name="description" rows="3"
                    class="form-control" id="description"
                    placeholder="description">{{{ Input::old('description') }}}</textarea>
                @if($errors->has('description'))
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
                    placeholder="price" 
                    {{ (Input::old('purchase_price')) ? ' value="' . e(Input::old('purchase_price')) . '"' : '' }}>
                @if($errors->has('purchase_price'))
                {{ $errors->first('purchase_price') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="retail_price" class="col-sm-2 control-label">Retail price</label>
            <div class="col-sm-3">
                <input 
                    type="text" name="retail_price" 
                    class="form-control" id="retail_price"
                    placeholder="price" 
                    {{ (Input::old('retail_price')) ? ' value="' . e(Input::old('retail_price')) . '"' : '' }}>
                @if($errors->has('retail_price'))
                {{ $errors->first('retail_price') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-lg my-btn-save" type="submit">Save</button>
                {{ Form::token() }}
                <button class="btn btn-lg my-btn-back">{{ HTML::linkRoute('product-list', 'Products list') }}</button>
            </div>
        </div>

    </form>
</div>

@stop