@extends('layout')

@section('title')
    Giỏ hàng
@stop

@section('content')
<div class="container">
	<h2 class="name-product">Giỏ hàng</h2>
	@if ($products_array)
		<table class="table table-striped">
	  	<thead>
	  		<tr>
		  		<th>STT</th>
				  <th>Mã sản phẩm</th>		
		  		<th>Tên</th>
		  		<th>Số lượng</th>
		  		<th class="right">Giá</th>
		  		<th class="right">Thành tiền</th>
		  	</tr>
	  	</thead>
	  	<tbody>
	  		<?php $i = 0; ?>
	  		@foreach( $products_array as $product)
	  			<tr>
	  				<?php $i++; ?>
	  				<td>{{ $i }}</td>
	  				<td>{{ $product["id"] }}</td>
						<td>{{ $product["name"] }}</td>
						<td>{{ $product["number"] }}</td>
						<td class="right">{{ number_format($product["price"], 0, ',', ' ') }} VNĐ</td>
						<td class="right">{{ number_format($product["price_total"], 0, ',', ' ') }} VNĐ</td>
	  			</tr>
				@endforeach
	  	</tbody>
		</table>
		<div class="right">
			<h4>Tổng tiền: {{ number_format($price_total, 0, ',', ' ') }} VNĐ</h4>
			<a href="/orders/delete" class="btn btn-default">Hủy giỏ hàng</a>
			<a href="/orders/create" class="btn btn-default">Tạo hóa đơn</a>
		</div>
	@else
		<p class="name-product">Hiện tại giỏ hàng của bạn chưa có sản phẩm nào</p>
	@endif
</div>
@endsection