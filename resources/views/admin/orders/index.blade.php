@extends('layout')

@section('title')
    Danh sách đơn hàng
@stop

@section('content')
<div class="container">
  <h1 class='name-product'>Danh sách đơn hàng</h1>
  <div class="container-fluid">
    @if (!count($orders))
      <h4 class="name-product">Hiện nay không có đơn hàng nào.</h4>
    @else
      <table class="table table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th> 
            <th>Tên người mua</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th class="right">Tổng tiền</th>
            <th>Chi tiết</th>
            <th>Thanh toán</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach( $orders as $order)
            <tr>
              <?php $i++; ?>
              <td>{{ $i }}</td>
              <td>MT{{ $order->id }}</td>
              <td>{{ $order->name_person }}</td>
              <td>{{ $order->address }}</td>
              <td>{{ $order->numberphone }}</td>
              <td class="right">{{ number_format($order->total_price, 0, ',', ' ') }} VNĐ</td>
              <td><a href="/orders/{{ $order->id }}">Chi tiết MT{{ $order->id }}</a></td>
              <td>
                @if ($order->activated)
                  <span class="glyphicon glyphicon-ok"></span>
                @else
                  {!! Form::open(array('class' => 'form-inline', 'method' => 'POST', 'route' => 'admin.orders.store')) !!}
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-check"></span></button>
                  {!! Form::close() !!}
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection