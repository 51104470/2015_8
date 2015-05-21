@extends('layout')

@section('title')
    Thông tin người dùng
@stop

@section('content')
<div class="container">
  <div class="page-header">
    <h1><small>Thông tin người dùng</small> {{ Auth::user()->name }}</h1>
  </div>
  <div class="center">
    <img src="/image/user.jpg" alt="User" class="img-circle">
  </div>
  <div class="container-fluid">
    <div class="list-group">
      <span class="list-group-item"><b>Họ tên: </b>{{ $profile->name }}</span>
      <span class="list-group-item"><b>Địa chỉ: </b>{{ $profile->address }}</span>
      <span class="list-group-item"><b>Số điện thoại: </b>{{ $profile->numberphone }}</span>
      <span class="list-group-item"><b>Email: </b>{{ $profile->email }}</span>
    </div>
    <div class="right">
      <a href="{{ Auth::user()->id }}/edit" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Edit </span></a>
    </div>
  </div>
</div>
@endsection