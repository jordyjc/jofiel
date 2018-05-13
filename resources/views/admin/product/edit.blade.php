@extends('admin.template')

@section('content')

<div class="container text-center">
    <div class="page-header">
        <h1>
            <i class="fa fa-shopping-cart"></i>
            PRODUCTOS <small>[Editar Producto]</small>
        </h1>
    </div>


    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">
                @if(count($errors) > 0)
                @include('partials.errors')
                @endif


                <!-- Formluario que abre un registro y pone los valores por defecto -->
                {!! Form::model($product, array('route' => array('product.update', $product->slug))) !!}


                <!-- Asimilia una peticion de tipo PUT-->
                <input type="hidden" name="_method" value="PUT">


                <div class="form-group">
                    <label for="category_id" class="control-label"> Categoria</label>
                    {!! Form::select('category_id', $categories, null, ['class' => 'from-control']) !!}
                </div>


                <div class="form-group">
                    <label for="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" > Nombre:</label>

                    {!!
                    Form::text(
                    'name',
                    null,
                    array(
                    'class' => 'from-control',
                    'required' => 'required',
                    'placeholder' => 'Ingresa el nombre...',
                    'autofocus' => 'autofocus'
                    )
                    )
                    !!}

                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                    @endif
                </div>


                <div class="form-group">
                    <label for="extract" class="form-control{{ $errors->has('extract') ? ' is-invalid' : '' }}" required> Extracto</label>

                    {!!
                    Form::text(
                    'extract',
                    null,
                    array(
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => 'Ingresa el extracto...'
                    )
                    )
                    !!}

                    @if ($errors->has('extract'))
                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('extract') }}</strong>
                                </span>
                    @endif
                </div>


                <div class="form-group">
                    <label for="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required> Descripción</label>

                    {!!
                    Form::textarea(
                    'description',
                    null,
                    array(
                    'class' => 'form-control',
                    'required' => 'required',
                    )
                    )
                    !!}

                    @if ($errors->has('description'))
                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" required> Precio</label>

                            {!!
                            Form::number(
                            'price',
                            null,
                            array(
                            'class' => 'form-control',
                            'autofocus' => 'autofocus',
                            'required' => 'required',
                            'placeholder' => 'Precio...'
                            )
                            )
                            !!}

                            @if ($errors->has('price'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-5">

                        <div class="form-group">
                            <label for="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" required> Imagen</label>

                            {!!
                            Form::text(
                            'image',
                            null,
                            array(
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'Ingresa url de imagen...'
                            )
                            )
                            !!}

                            @if ($errors->has('image'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stock" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" required> Stock</label>

                            {!!
                            Form::number(
                            'stock',
                            null,
                            array(
                            'class' => 'form-control',
                            'required' => 'required',
                            'autofocus' => 'autofocus',
                            'placeholder' => 'Cantidad almacen...'
                            )
                            )
                            !!}

                            @if ($errors->has('stock'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('stock') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div></div>

                <div class="row ">
                    <div class="col-md-5"></div>
                    <div class="col-md-1 ">

                        <div class="form-group">
                            <label for="visible"> Visible  </label>
                        </div>
                    </div>

                    <div class="col-md-2 ">
                        <input type="checkbox" name="visible" {{ $product->visible == 1 ? "checked = 'checked'" : '' }}>
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::submit('Actualizar', array('class' => 'btn btn-primary')) !!}
                    <a href="{{ route('product.index') }}" class="btn btn-warning"> Cancelar</a>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

</div>
@stop