@extends('store.template')

@section('content')

<div class="products">
    @foreach($products as $product)
    <div class="product">
        <h3>{{$product->name}}</h3>
        <img src="{{$product->image}}" width="250">
        <div class="product-info">
            <p>Precio: ${{number_format($product->price,2)}}</p>
            <a href="#">Lo quiero</a>
            <a href="{{ route ('product-detail', $product->slug) }}">Leer más</a>
        </div>
    </div>
    @endforeach
</div>
@stop