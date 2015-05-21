@extends('layout')

@section('title')
    Chỉnh sửa người dùng
@stop

@section('content')
<div class="container">
    <h2 class="name-product center">Chỉnh sửa người dùng</h2>
  
    <form class="form-horizontal" role="form" method="POST" action="update">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <div class="form-group">
        <label class="col-md-4 control-label">Tên: </label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">Địa chỉ: </label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="address" value="{{ $profile->address }}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">SĐT: </label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="numberphone" value="{{ $profile->numberphone }}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 col-md-offset-4 right">
          <button type="submit" class="btn btn-default">Xác nhận</button>
        </div>
      </div>
    </form>
</div>
@endsection