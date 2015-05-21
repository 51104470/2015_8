@extends('layout')

@section('title')
    Chi tiết sản phẩm
@stop

@section('content')
<div class="container">
	<h2 class='name-product'>{{ $product->name }}</h2>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-xs-12">
        <img class="center-block img-responsive" src="{{ $product->image }}" />
      </div>
      <div class="col-md-8 col-xs-12">
        <h4>Giới thiệu: </h4>
        <p>
          {{ $product->description }}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection