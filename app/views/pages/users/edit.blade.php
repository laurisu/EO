@extends('layouts.default')

@section('title')
@parent
:: Edit account
@stop

@section('content')
<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Edit account</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('account-update', array($user->id)) }}" method="post">

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="name" 
                    class="form-control" id="inputName"
                    placeholder="Name" 
                    value="{{ $user->name }}">
                
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
                    value="{{ $user->surname }}">
                
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
                    value="{{ $user->username }}">

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
                    value="{{ $user->phone }}">

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
                    value="{{ $user->email }}">

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
                    value="{{ $user->job_title }}">

                @if($errors->has('job_title'))
                {{ $errors->first('job_title') }}
                @endif  
            </div>
        </div>


        <div class="form-group">
            <label for="inputRole" class="col-sm-2 control-label">Permisions</label>
            <div class="col-sm-4">
                <select name="role" class="form-control" id="inputRole">
                    @if($user->role == 2)
                        <option value="0">Simple user</option>
                        <option value="2" selected="selected">User with Admin rights</option>
                    @else
                        <option value="0" selected="selected">Simple user</option>
                        <option value="2">User with Admin rights</option>
                    @endif
                </select>

                @if($errors->has('role'))
                {{ $errors->first('role') }}
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputActive" class="col-sm-2 control-label">Account status</label>
            <div class="col-sm-4">
                <select name="active" class="form-control" id="inputActive">
                    @if($user->active == 1)
                        <option value="0">Disabled</option>
                        <option value="1" selected="selected">Activated</option>
                    @else
                        <option value="0" selected="selected">Disabled</option>
                        <option value="1">Activated</option>
                    @endif
                </select>

                @if($errors->has('active'))
                {{ $errors->first('active') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-md my-btn-save" type="submit">
                    <i class="fa fa-floppy-o"></i> Save changes
                </button>
                <a href="{{{ route('users-list') }}}" class="btn btn-md my-btn-back">
                    <i class="fa fa-list-alt"></i> Users list
                </a>
                {{ Form::token() }}
            </div>
        </div>

    </form>

</div>
@stop

