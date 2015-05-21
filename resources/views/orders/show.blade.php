@extends('layout')

@section('title')
    Chi tiết đơn hàng
@stop

@section('content')
<div class="container">
	<h1 class='name-product'>Chi tiết đơn hàng</h1>
  <div class="container-fluid">
    @if (!count($product_list))
      <h4 class="name-product">Đơn hàng này không tồn tại</h4>
    @else
      <h3 class='name-product'>Mã số đơn hàng MT{{ $order->id }}</h3>
      <h4 class="name-product">Tên khách hàng: {{ $order->name_person }}</h4>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>Mã sản phẩm</th>    
            <th>Tên</th>
            <th>Số lượng</th>
            <th class='right'>Giá</th>
            <th class='right'>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach( $product_list as $product)
            <tr>
              <?php $i++; ?>
              <td>{{ $i }}</td>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $number_list[$i - 1]->number }}</td>
              <td class='right'>{{ number_format($product->price, 0, ',', ' ') }} VNĐ</td>
              <td class='right'>{{ number_format($product->price * $number_list[$i - 1]->number, 0, ',', ' ') }} VNĐ</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <h4 class="name-product right">Tổng tiền: {{ number_format($order->total_price, 0, ',', ' ') }} VNĐ</h4>
    @endif
  </div>
</div>
@endsection