@extends('store.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping cart">Detalle del Producto</i></h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="product-block">
                <img src="{{ $product->image }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-block">
                <h3>{{ $product->name }}</h3><hr>
                <div class="product-info panel">
                    <p>{{ $product->description }}</p>
                    <h3> 
                        <div class="span label label-success">
                            Precio: ${{ number_format($product->price,2) }}
                        </div> 
                    </h3>
                    <p>{{$product->color}}</p>
                    <p>
                        <a class="btn btn-warning btn-block" href="#"> 
                            <i class="fa fa-cart plus fa-2x "></i> Lo quiero</a>
                    </p>
                </div>
            </div>
        </div>
    </div> <hr>

    <p><a class="btn btn-primary" href="{{ route('home') }}"> 
        <i class="fa fa-chevron circle-lef"></i> Regresar</a></p>
</div>
@stop