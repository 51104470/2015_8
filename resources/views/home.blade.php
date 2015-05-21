@extends('layout')

@section('title')
    Trang chủ
@stop

@section('content')

@include('layout/partials/_carousel' )

<div class="container">
	<ul class="breadcrumb" role="tablist">
		<li class="active"><a href="#tab-latest" role="tab" data-toggle="tab">Sản phẩm mới nhất</a></li>
		<li><a href="#tab-bestseller" role="tab" data-toggle="tab">Sản phẩm đánh giá cao nhất</a></li>
		<li><a href="#tab-mostviewed" role="tab" data-toggle="tab">Sản phẩm xem nhiều nhất</a></li>
	</ul>


	<!-- <ul class="nav nav-pills">
	  <li role="presentation"><a href="#tab-latest">Sản phẩm mới nhất</a></li>
	  <li role="presentation"><a href="#tab-bestseller">Sản phẩm bán chạy nhất</a></li>
	  <li role="presentation"><a href="#tab-mostviewed">Sản phẩm xem nhiều nhất</a></li>
	</ul> -->
	
	<div class="tab-content">
	  <div class="tab-pane active" id="tab-latest">
		  <div class="row">      
		    @foreach( $new_products as $product )
		    	<div class="product-container col-md-3 col-sm-6 col-xs-12">
						<div class="testproduct" >
						  <!-- Production line : BEGIN -->
						  <div class="production-line">
								<div class="product-image">
								  <img class="center-block img-responsive img-rounded image-product" src="{!! $product->image !!}" href="{!! route('admin.products.show', $product->slug) !!}"/>
								  <!-- Button trigger modal -->
									<button type="button" class="quick-view" data-toggle="modal" data-target="#myModal{{ $product->id }}">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								  <div class="wrap-price2">
								  	<span class="product-price"> {{ number_format($product->price, 0, ',', ' ') }} VNĐ </span>
								  </div>
								  <div class="wrap-price">
										<span class="new-box">
										<span class="new-label">Mới</span>
										</span>
										<span class="sale-box">
										<span class="sale-label">Sale!</span>
										</span>
									</div>
								</div>

								<!-- Bottom-info: BEGIN -->
								<div class="bottom-info" >
									<div class="product-content">
									  <div class="cover-product-content">
									  	<a href="{!! route('products.show', $product->slug) !!}">
							          <h4 class='name-product'>{!! $product->name !!}</h4>
							        </a>
									  	<p>
						            @for ($i=1; $i <= 5 ; $i++)
						              <span class="glyphicon glyphicon-star{!!  ($i <= $product->rating_cache) ? ' yellow' : '-empty' !!}"></span>
						            @endfor
						            {!!  number_format($product->rating_cache, 1)  !!} điểm
						          </p>
									  </div>
									  <div class="production-description">
											@if (is_null($product->description))
												<p>Sản phẩm mới</p>
											@else	
												<p>{{ str_limit( $product->description, $limit = 70, $end = '...') }} </p>
											@endif
											<p>Lượt xem: {{ $product->view_number }}</p>
									  </div>
										</div>
										<div class="price-info">
											<div class="row">
												<div class="col-xs-6">
													<span class="price">{{ number_format($product->price, 0, ',', ' ') }} VNĐ</span>
												</div>
												<div class="col-xs-6">
													<a href="/add_cart/{{ $product->id }}" class="btn btn-danger">Mua hàng</a>
												</div>
											</div>
									</div>
								</div> <!--Bottom-info: END-->
						  </div>
						  <!-- Production line : END -->
						 </div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="myModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">{{ $product->name }}</h4>
					      </div>
					      <div class="modal-body">
					        <img class="center-block img-responsive img-rounded image-product" src="{!! $product->image !!}"/>
					      </div>
					      <div class="modal-footer">
					      	<a href="/add_cart/{{ $product->id }}" class="btn btn-default">Mua hàng</a>
					      </div>
					    </div>
					  </div>
					</div>
		    @endforeach
		  </div>
		  <div class="right">
		  	{!! $new_products->render() !!}
		  </div>
		</div>

		<div class="tab-pane" id="tab-bestseller">
		  <div class="row">      
		    @foreach( $rate_products as $product )
		    	<div class="product-container col-md-3 col-sm-6 col-xs-12">
						<div class="testproduct" >
						  <!-- Production line : BEGIN -->
						  <div class="production-line">
								<div class="product-image">
								  <img class="center-block img-responsive img-rounded image-product" src="{!! $product->image !!}" href="{!! route('admin.products.show', $product->slug) !!}"/>
								  <!-- Button trigger modal -->
									<button type="button" class="quick-view" data-toggle="modal" data-target="#myModal{{ $product->id }}">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								  <div class="wrap-price2">
								  	<span class="product-price"> {{ number_format($product->price, 0, ',', ' ') }} VNĐ </span>
								  </div>
								  <div class="wrap-price">
										<span class="new-box">
										<span class="new-label">Mới</span>
										</span>
										<span class="sale-box">
										<span class="sale-label">Sale!</span>
										</span>
									</div>
								</div>

								<!-- Bottom-info: BEGIN -->
								<div class="bottom-info" >
									<div class="product-content">
									  <div class="cover-product-content">
									  	<a href="{!! route('products.show', $product->slug) !!}">
							          <h4 class='name-product'>{!! $product->name !!}</h4>
							        </a>
									  	<p>
						            @for ($i=1; $i <= 5 ; $i++)
						              <span class="glyphicon glyphicon-star{!!  ($i <= $product->rating_cache) ? ' yellow' : '-empty' !!}"></span>
						            @endfor
						            {!!  number_format($product->rating_cache, 1)  !!} điểm
						          </p>
									  </div>
									  <div class="production-description">
											@if (is_null($product->description))
												<p>Sản phẩm mới</p>
											@else	
												<p>{{ str_limit( $product->description, $limit = 70, $end = '...') }} </p>
											@endif
											<p>Lượt xem: {{ $product->view_number }}</p>
									  </div>
										</div>
										<div class="price-info">
											<div class="row">
												<div class="col-xs-6">
													<span class="price">{{ number_format($product->price, 0, ',', ' ') }} VNĐ</span>
												</div>
												<div class="col-xs-6">
													<a href="/add_cart/{{ $product->id }}" class="btn btn-danger">Mua hàng</a>
												</div>
											</div>
									</div>
								</div> <!--Bottom-info: END-->
						  </div>
						  <!-- Production line : END -->
						 </div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="myModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">{{ $product->name }}</h4>
					      </div>
					      <div class="modal-body">
					        <img class="center-block img-responsive img-rounded image-product" src="{!! $product->image !!}"/>
					      </div>
					      <div class="modal-footer">
					      	<a href="/add_cart/{{ $product->id }}" class="btn btn-default">Mua hàng</a>
					      </div>
					    </div>
					  </div>
					</div>
		    @endforeach
		  </div>
		  <div class="right">
		  	{!! $rate_products->render() !!}
		  </div>
		</div>

		<div class="tab-pane" id="tab-mostviewed">
	  	<div class="row">      
		    @foreach( $view_products as $product )
	    	<div class="product-container col-md-3 col-sm-6 col-xs-12">
					<div class="testproduct" >
					  <!-- Production line : BEGIN -->
					  <div class="production-line">
							<div class="product-image">
							  <img class="center-block img-responsive img-rounded image-product" src="{!! $product->image !!}" href="{!! route('admin.products.show', $product->slug) !!}"/>
							  <!-- Button trigger modal -->
								<button type="button" class="quick-view" data-toggle="modal" data-target="#myModal{{ $product->id }}">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							  <div class="wrap-price2">
							  	<span class="product-price"> {{ number_format($product->price, 0, ',', ' ') }} VNĐ </span>
							  </div>
							  <div class="wrap-price">
									<span class="new-box">
									<span class="new-label">Mới</span>
									</span>
									<span class="sale-box">
									<span class="sale-label">Sale!</span>
									</span>
								</div>
							</div>

							<!-- Bottom-info: BEGIN -->
							<div class="bottom-info" >
								<div class="product-content">
								  <div class="cover-product-content">
								  	<a href="{!! route('products.show', $product->slug) !!}">
						          <h4 class='name-product'>{!! $product->name !!}</h4>
						        </a>
								  	<p>
					            @for ($i=1; $i <= 5 ; $i++)
					              <span class="glyphicon glyphicon-star{!!  ($i <= $product->rating_cache) ? ' yellow' : '-empty' !!}"></span>
					            @endfor
					            {!!  number_format($product->rating_cache, 1)  !!} điểm
					          </p>
								  </div>
								  <div class="production-description">
										@if (is_null($product->description))
											<p>Sản phẩm mới</p>
										@else	
											<p>{{ str_limit( $product->description, $limit = 70, $end = '...') }} </p>
										@endif
										<p>Lượt xem: {{ $product->view_number }}</p>
								  </div>
									</div>
									<div class="price-info">
										<div class="row">
											<div class="col-xs-6">
												<span class="price">{{ number_format($product->price, 0, ',', ' ') }} VNĐ</span>
											</div>
											<div class="col-xs-6">
												<a href="/add_cart/{{ $product->id }}" class="btn btn-danger">Mua hàng</a>
											</div>
										</div>
								</div>
							</div> <!--Bottom-info: END-->
					  </div>
					  <!-- Production line : END -->
					 </div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="myModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">{{ $product->name }}</h4>
				      </div>
				      <div class="modal-body">
				        <img class="center-block img-responsive img-rounded image-product" src="{!! $product->image !!}"/>
				      </div>
				      <div class="modal-footer">
				      	<a href="/add_cart/{{ $product->id }}" class="btn btn-default">Mua hàng</a>
				      </div>
				    </div>
				  </div>
				</div>
		    @endforeach
  		</div>
  		<div class="right">
				{!! $view_products->render() !!}
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="right">
		<div class="fb-page" data-href="https://www.facebook.com/fanpage.truyentranh24" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/fanpage.truyentranh24"><a href="https://www.facebook.com/fanpage.truyentranh24">Truyện Tranh 24h</a></blockquote></div></div>
	</div>
</div>
@endsection
