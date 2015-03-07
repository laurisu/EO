@extends('layouts.default')

@section('title')
@parent
:: Create customer
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Create customer profile</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('customer-create-post') }}" method="post">

        <div class="form-group">
            <label for="inputCustomerName" class="col-sm-3 control-label">Company name</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="customer"
                    class="form-control" id="inputCustomerName"
                    placeholder="Company name" 
                    {{ (Input::old('customer')) ? ' value="' . e(Input::old('customer')) . '"' : '' }} 
                    autofocus>
                @if($errors->has('customer'))
                {{ $errors->first('customer') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="contactPerson" class="col-sm-3 control-label">Contact person</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="contact_person" 
                    class="form-control" id="contactPerson"
                    placeholder="Name Surname" 
                    {{ (Input::old('contact_person')) ? ' value="' . e(Input::old('contact_person')) . '"' : '' }}>
                @if($errors->has('contact_person'))
                {{ $errors->first('contact_person') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerEmail" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-4">
                <input 
                    type="email" name="email" 
                    class="form-control" id="customerEmail"
                    placeholder="Email" 
                    {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }}>
                @if($errors->has('email'))
                {{ $errors->first('email') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerPhone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-4">
                <input 
                    type="tel" name="phone" 
                    class="form-control" id="customerPhone"
                    placeholder="Phone" 
                    {{ (Input::old('phone')) ? ' value="' . e(Input::old('phone')) . '"' : '' }}>
                @if($errors->has('phone'))
                {{ $errors->first('phone') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerMobile" class="col-sm-3 control-label">Mobile</label>
            <div class="col-sm-4">
                <input 
                    type="tel" name="mobile" 
                    class="form-control" id="customerMobile"
                    placeholder="Mobile" 
                    {{ (Input::old('mobile')) ? ' value="' . e(Input::old('mobile')) . '"' : '' }}>
                @if($errors->has('mobile'))
                {{ $errors->first('mobile') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerPage" class="col-sm-3 control-label">Web page</label>
            <div class="col-sm-4">
                <input 
                    type="url" name="web_page" 
                    class="form-control" id="customerPage"
                    placeholder="Web page" 
                    {{ (Input::old('web_page')) ? ' value="' . e(Input::old('web_page')) . '"' : '' }}>
                @if($errors->has('web_page'))
                {{ $errors->first('web_page') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="customerAddress" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-8">
                <textarea 
                    name="address" rows="2"
                    class="form-control" id="customerAddress"
                    placeholder="Address">{{{ Input::old('address') }}}</textarea>
                @if($errors->has('address'))
                {{ $errors->first('address') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button class="btn btn-sm my-btn-save" type="submit">
                    <i class="fa fa-floppy-o"></i> Save
                </button>
                {{ Form::token() }}
                <button class="btn btn-sm my-btn-back">
                    <i class="fa fa-list-alt"></i> {{ HTML::linkRoute('customer-list', 'Customers list') }}
                </button>
            </div>
        </div>

    </form>
</div>

@stop