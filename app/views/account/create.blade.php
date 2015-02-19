@extends('layouts.default')

@section('title')
@parent
:: Create account
@stop

@section('content')
<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Create account</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('account-create-post') }}" method="post">

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="name" 
                    class="form-control" id="inputName"
                    placeholder="Name" 
                    {{ (Input::old('name')) ? ' value="' . e(Input::old('name')) . '"' : '' }} autofocus>

                @if($errors->has('name'))
                {{ $errors->first('name') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="inputSurname" class="col-sm-2 control-label">Surname</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="surname" 
                    class="form-control" id="inputSurname"
                    placeholder="Surname" 
                    {{ (Input::old('surname')) ? ' value="' . e(Input::old('surname')) . '"' : '' }}>

                @if($errors->has('surname'))
                {{ $errors->first('surname') }}
                @endif
            </div>
        </div>

        <hr>
        
        <div class="form-group">
            <label for="inputUsername" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="username" 
                    class="form-control" id="inputUsername"
                    placeholder="Username" 
                    {{ (Input::old('username')) ? ' value="' . e(Input::old('username')) . '"' : '' }}>

                @if($errors->has('username'))
                {{ $errors->first('username') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="userPhone" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="phone" 
                    class="form-control" id="userPhone"
                    placeholder="Phone number"
                    {{ (Input::old('phone')) ? ' value="' . e(Input::old('phone')) . '"' : '' }}>

                @if($errors->has('phone'))
                {{ $errors->first('phone') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="userEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
                <input 
                    type="email" name="email" 
                    class="form-control" id="userEmail"
                    placeholder="Email"
                    {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }}>

                @if($errors->has('email'))
                {{ $errors->first('email') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="jobTitle" class="col-sm-2 control-label">Job title</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="job_title" 
                    class="form-control" id="jobTitle"
                    placeholder="Title"
                    {{ (Input::old('job_title')) ? ' value="' . e(Input::old('job_title')) . '"' : '' }}>

                @if($errors->has('job_title'))
                {{ $errors->first('job_title') }}
                @endif  
            </div>
        </div>


        <div class="form-group">
            <label for="inputRole" class="col-sm-2 control-label">Permisions</label>
            <div class="col-sm-4">
                <select name="role" class="form-control" id="inputRole">
                    <option value="0" selected>Simple user</option>
                    <option value="2">User with Admin rights</option>
                </select>

                @if($errors->has('role'))
                {{ $errors->first('role') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="uploadImage" class="col-sm-2 control-label">Upload Image</label>
            <div class="col-sm-4">

                <!-- Bootstrap Filestyle plugin used / below atributes options -->
                <!-- class="filestyle"  -> Triggers the plugin -->
                <!-- data-input         -> Enables or disables the input text (boolean) -->
                <!-- data-buttonText    -> Changes the button text -->
                <!-- data-buttonName    -> Change classes bootstrap button -->
                <!-- data-icon          -> Enables or disables the button icon (boolean) -->
                <!-- data-size          -> Change size bootstrap of the button and input -->
                <!-- data-iconName      -> Change classes bootstrap icons -->
                <!-- data-disabled      -> Disabled button (boolean) -->
                <!-- data-buttonBefore  -> Button before (boolean) -->
                <!-- data-badge         -> Enables or disables the badge counter (boolean) -->

                <input 
                    type="file" id="uploadImage"  
                    class="filestyle"               
                    data-buttonText="Choose file"
                    data-buttonName="btn-primary">

<!--                @if($errors->has('role'))
                {{ $errors->first('role') }}
                @endif-->
            </div>
        </div>

        <div class="form-group">
            <label for="inputPass" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
                <input 
                    type="password" name="password" id="inputPass"
                    class="form-control" placeholder="Password" >

                @if($errors->has('password'))
                {{ $errors->first('password') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassAgain" class="col-sm-2 control-label">Repeat password</label>
            <div class="col-sm-4">
                <input 
                    type="password" name="password_again" id="inputPassAgain"
                    class="form-control" placeholder="Repeat password" >
                @if($errors->has('password_again'))
                {{ $errors->first('password_again') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-lg my-btn-save" type="submit">Create account</button>
                {{ Form::token() }}
            </div>
        </div>

    </form>

</div>
@stop