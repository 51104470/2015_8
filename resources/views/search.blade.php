@extends('layout')

@section('title')
    Danh sách tìm kiếm
@stop

@section('content')
  <div class="container">
    <h2 class="name-product">Danh sách tìm kiếm</h2>
    @if ( !$products->count() )
      <h4 class='name-product'>Không có kết quả nào.</h4>
    @else
      <div class="row">      
        @foreach( $products as $product )
          <div class="col-xs-6 col-md-3 product-tab">
            <a href="{!! route('products.show', $product->slug) !!}">
              <img class="center-block img-responsive img-rounded image-product" src="{!! $product->image !!}" href="{!! route('admin.products.show', $product->slug) !!}"/>
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
            </a>
          </div>
        @endforeach
      </div>
    @endif
  </div>
@endsection