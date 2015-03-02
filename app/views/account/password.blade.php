@extends('layouts.default')

@section('title')
@parent
:: Change password
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Change password</h4>
    </div>

    <form class="form-horizontal" action="{{ URL::route('change-password-post') }}" method="post">

        <div class="form-group">
            <label for="inputOldPassword" class="col-sm-3 control-label">Old password</label>
            <div class="col-sm-4">
                <input type="password" id="inputOldPassword" name="old_password" class="form-control" placeholder="Old password" autofocus>
                @if($errors->has('old_password'))
                {{ $errors->first('old_password') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="inputNewPassword" class="col-sm-3 control-label">New password</label>
            <div class="col-sm-4">
                <input type="password" id="inputNewPassword" name="password" class="form-control" placeholder="New password">
                @if($errors->has('password'))
                {{ $errors->first('password') }}
                @endif    
            </div>
        </div>

        <div class="form-group">
            <label for="inputNewPasswordAgain" class="col-sm-3 control-label">Repeat new password</label>
            <div class="col-sm-4">   
                <input type="password" id="inputNewPasswordAgain" name="password_again" class="form-control" placeholder="New password again">
                @if($errors->has('password_again'))
                {{ $errors->first('password_again') }}
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button class="btn btn-sm my-btn-save" type="submit"><i class="fa fa-floppy-o"></i> Change password</button>
                {{ Form::token() }}
            </div>
        </div>

    </form>

</div>

@stop