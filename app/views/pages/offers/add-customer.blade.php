@extends('layouts.default')

@section('title')
@parent
:: Choose customer
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Choose customer</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('product-update', array($product->id)) }}" method="post">

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Customer</label>
            <div class="col-sm-4">
                
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-md my-btn-save" type="submit">
                    <i class="fa fa-floppy-o"></i> Save
                </button>
                <a href="{{{ route('product-list') }}}" class="btn btn-md my-btn-back">
                    <i class="fa fa-list-alt"></i> Products list
                </a>
                {{ Form::token() }}
                <button
                    type="button"
                    class="btn btn-md my-btn-delete" 
                    data-toggle="modal" data-target="#confirmDelete" 
                    data-title="Delete Product" 
                    data-test="test" 
                    data-message='Are you sure you want to delete product - {{ $product->product_name }}?'
                    data-href="{{ route('product-delete', array('id' => $product->id)) }}" 
                    >
                    <i class="fa fa-trash-o"></i> Delete
                </button>    

                
            </div>
        </div>

    </form>

</div>

@include('includes.delete_confirm')

@stop


