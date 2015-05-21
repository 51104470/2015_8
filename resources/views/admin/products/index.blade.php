@extends('layout')

@section('title')
    Danh sách sản phẩm
@stop

@section('content')
  <div class="container">
    <h2 class="name-product">Danh sách sản phẩm</h2>
    @if ( !$products->count() )
      <h4 class='name-product'>Hiện nay không có sản phẩm nào có thể đọc. Chúng tôi sẽ nhanh chóng cập nhật sản phẩm mới nhất.</h4>
    @else
      <div class="row">      
        @foreach( $products as $product )
          <div class="col-xs-6 col-md-3 product-tab">
          {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('admin.products.destroy', $product->slug))) !!}
            <a href="{!! route('admin.products.show', $product->slug) !!}">
              <img class="center-block img-responsive img-rounded image-product" src="{!! $product->image !!}" href="{!! route('admin.products.show', $product->slug) !!}"/>
              <h4 class='name-product'>{!! $product->name !!}</h4>
              <div class="row">
                <div class="col-xs-6 center">
                  <a href="/admin/products/{{ $product->slug }}/edit" class="btn btn-default btn-width-100"><span class="glyphicon glyphicon-cog" aria-hidden="true"> Edit </span></a>
                </div>
                <div class="col-xs-6 center">
                  <button type="submit" class="btn btn-default btn-width-100"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete </button>
                </div>
              </div>
            </a>
          {!! Form::close() !!}
          </div>
        @endforeach
      </div>
    @endif
    <p>
      {!! link_to_route('admin.products.create', 'Tạo sản phẩm mới', [], array('class' => 'btn btn-default')) !!}
    </p>
  </div>
@endsection