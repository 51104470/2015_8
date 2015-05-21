@extends('layout')

@section('title')
    Chỉnh sửa sản phẩm
@stop

@section('content')
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>
 
    {!! Form::model($product, ['method' => 'PATCH', 'route' => ['admin.products.update', $product->slug], 'files' => true]) !!}
        @include('admin/products/partials/_form', ['submit_text' => 'Chỉnh sửa'])
    {!! Form::close() !!}
</div>
@endsection