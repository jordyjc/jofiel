@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-shopping-cart"></i>
                CATEGORIAS <small>[Agregar Categoria]</small>
            </h1>
        </div>


        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="page">

                    <!--
                    @if(count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
-->

                    {!! Form::open(['route' => 'category.store']) !!}


                    <div class="form-group">
                        <label for="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" > Nombre:</label>

                        {!!
                            Form::text(
                                'name',
                                null,
                                array(
                                    'class' => 'from-control',
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
                        <label for="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required> Descripción</label>

                        {!!
                            Form::textarea(
                                'description',
                                null,
                                array(
                                    'class' => 'form-control'
                                )
                            )
                        !!}

                        @if ($errors->has('description'))
                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="color"> Color: </label>
                        <input type="color" name="color" class="form-control">
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Guardar', array('class' => 'btn btn-primary')) !!}
                        <a href="{{ route('category.index') }}" class="btn btn-warning"> Cancelar</a>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
@stop