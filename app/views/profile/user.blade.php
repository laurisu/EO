@extends('layouts.default')

@section('content')
<p>Hello  {{ e($user->username) }}! This is your rofile</p>
<p>Hello  {{ e($user->email) }}! This is your rofile</p>
@stop