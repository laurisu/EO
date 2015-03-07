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
                <button class="btn btn-sm my-btn-save" type="submit">
                    <i class="fa fa-floppy-o"></i> Save
                </button>
                <button class="btn btn-sm my-btn-back">
                    <i class="fa fa-list-alt"></i> {{ HTML::linkRoute('customer-list', 'Customers list') }}
                </button>
                {{ Form::token() }}
                
                    <a href="{{ Url::route('customer-delete', array('id' => $customer->id)) }}" class="btn btn-sm my-btn-delete" type="submit">
                        <i class="fa fa-trash-o"></i> Delete
                    </a>

                <div id="confirmDelete" class="modal hide fade">
                    <div class="modal-body">
                        Are you sure you want to delete product - {{ $customer->customer }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                    </div>
                </div>
                
            </div>
        </div>

    </form>

</div>

@include('includes.delete_confirm')
@stop
