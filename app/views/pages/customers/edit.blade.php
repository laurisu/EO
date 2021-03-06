@extends('layouts.default')

@section('title')
@parent
:: Edit customer
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Product editor</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('customer-update', array($customer->id)) }}" method="post">

        <div class="form-group">
            <label for="customerName" class="col-sm-2 control-label">Customer</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="customer" 
                    class="form-control" id="customerName"
                    placeholder="Customer name" 
                    value="{{ $customer->customer }}" autofocus>
                @if($errors->has('customer'))
                {{ $errors->first('customer') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerContact" class="col-sm-2 control-label">Contact person</label>
            <div class="col-sm-4">
                <input
                    type="text" name="contact_person"
                    class="form-control" id="customerContact"
                    placeholder="Name Surname" 
                    value="{{ $customer->contact_person }}">
                @if($errors->has('contact_person'))
                {{ $errors->first('contact_person') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
                <input 
                    type="email" name="email" 
                    class="form-control" id="customerEmail"
                    placeholder="email" 
                    value="{{ $customer->email }}">
                @if($errors->has('email'))
                {{ $errors->first('email') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerPhone" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="phone" 
                    class="form-control" id="customerPhone"
                    placeholder="phone" 
                    value="{{ $customer->phone }}">
                @if($errors->has('phone'))
                {{ $errors->first('phone') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerMobile" class="col-sm-2 control-label">Mobile</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="mobile" 
                    class="form-control" id="customerMobile"
                    placeholder="Mobile phone" 
                    value="{{ $customer->mobile }}">
                @if($errors->has('mobile'))
                {{ $errors->first('mobile') }}
                @endif  
            </div>
        </div>
        
        <div class="form-group">
            <label for="customerHompage" class="col-sm-2 control-label">Homepage</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="web_page" class="form-control" id="customerHompage"
                    placeholder="homepage" 
                    value="{{ $customer->web_page }}">
                @if($errors->has('web_page'))
                {{ $errors->first('web_page') }}
                @endif  
            </div>
        </div>
        
        <div class="form-group">
            <label for="customerAddress" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="address" class="form-control" id="customerAddress"
                    placeholder="address" 
                    value="{{ $customer->address }}">
                @if($errors->has('address'))
                {{ $errors->first('address') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                
                <button class="btn btn-md my-btn-save" type="submit">
                    <i class="fa fa-floppy-o"></i> Save
                </button>
                <a href="{{{ route('customer-list') }}}" class="btn btn-md my-btn-back">
                    <i class="fa fa-list-alt"></i> Customers list
                </a>
                {{ Form::token() }}
                
                <button
                    type="button"
                    class="btn btn-md my-btn-delete" 
                    data-toggle="modal" data-target="#confirmDelete" 
                    data-title="Delete Customer" 
                    data-test="test" 
                    data-message='Are you sure you want to delete cuatomer - {{ $customer->customer }}?'
                    data-href="{{ route('customer-delete', array('id' => $customer->id)) }}" 
                    >
                    <i class="fa fa-trash-o"></i> Delete
                </button>           

            </div>
        </div>

    </form>

</div>

@include('includes.delete_confirm')
@stop
