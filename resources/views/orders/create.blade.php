@extends('layout')

@section('title')
    Chi tiết hóa đơn
@stop

@section('content')
<div class="container">
	<h2 class="name-product">Chi tiết hóa đơn</h2>
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
		</div>

		<h3 class="name-product">Mời bạn nhập tất cả thông tin cần thiết</h3>

		{!! Form::model(new App\Order, ['route' => ['orders.store']]) !!}

			{!! Form::hidden('total_price', $price_total) !!}

			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

	    <div class="form-group row">
			  <div class="col-xs-4">
			  	{!! Form::label('name_person', 'Tên:', array('class' => 'input-label')) !!}
			  </div>
			  <div class="col-xs-8">
			  	@if (is_null($profile))
			  		{!! Form::text('name_person', null, ['size' => '70']) !!}
			  	@else
			  		{!! Form::text('name_person', $profile->name, ['size' => '70']) !!}
			  	@endif
			  </div>
			</div>

			<div class="form-group row">
			  <div class="col-xs-4">
			  	{!! Form::label('address', 'Địa chỉ:', array('class' => 'input-label')) !!}
			  </div>
			  <div class="col-xs-8">
			  	@if (is_null($profile))
			  		{!! Form::text('address', null, ['size' => '70']) !!}
			  	@else
			  		{!! Form::text('address', $profile->address, ['size' => '70']) !!}
			  	@endif
			  </div>
			</div>

			<div class="form-group row">
			  <div class="col-xs-4">
			  	{!! Form::label('numberphone', 'SĐT:', array('class' => 'input-label')) !!}
			  </div>
			  <div class="col-xs-8">
			  	@if (is_null($profile))
			  		{!! Form::text('numberphone', null, ['size' => '70']) !!}
			  	@else
			  		{!! Form::text('numberphone', $profile->numberphone, ['size' => '70']) !!}
			  	@endif
			  </div>
			</div>

			<div class="form-group row">
			  <div class="col-xs-4">
			  	{!! Form::label('email', 'Email:', array('class' => 'input-label')) !!}
			  </div>
			  <div class="col-xs-8">
			  	@if (is_null($profile))
			  		{!! Form::text('email', null, ['size' => '70']) !!}
			  	@else
			  		{!! Form::text('email', $profile->email, ['size' => '70']) !!}
			  	@endif
			  </div>
			</div>

			<div class="form-group row">
			  <div class="col-xs-4">
			  	{!! Form::label('note', 'Ghi chú:', array('class' => 'input-label')) !!}
			  </div>
			  <div class="col-xs-8">
			  	{!! Form::textarea('note', null, ['size' => '72x5']) !!}
			  </div>
			</div>

			<div class="form-group right">
			    {!! Form::submit('Xác nhận', ['class'=>'btn primary']) !!}
			</div>
	  {!! Form::close() !!}
	@else
		<p class="name-product">Bạn chưa chọn sản phẩm nào</p>
	@endif
</div>
@endsection