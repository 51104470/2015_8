@extends('layout')

@section('title')
    Tạo sản phẩm
@stop

@section('content')
<div class="container">
    <h2>Tạo sản phẩm</h2>

    {!! Form::model(new App\Product, ['route' => ['admin.products.store'], 'files' => true]) !!}
        @include('admin/products/partials/_form', ['submit_text' => 'Tạo'])
    {!! Form::close() !!}
</div>
@endsection