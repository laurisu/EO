@extends('layouts.default')

@section('content')
<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Create account</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('account-create-post') }}" method="post">

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="email" 
                    class="form-control" id="inputName"
                    placeholder="Email address"
                    {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }} autofocus>

                @if($errors->has('email'))
                {{ $errors->first('email') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="inputUsername" class="col-sm-2 control-label">Username:</label>
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