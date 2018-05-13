@extends('admin.template')

@section('content')

<div class="container text-center">
    <div class="page-header">
        <h1>
            <i class="fa fa-user"></i>
            USUARIOS <small>[Editar Usuario]</small>
        </h1>
    </div>


    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">
                @if(count($errors) > 0)
                @include('admin.partials.errors')
                @endif


                <!-- Formluario que abre un registro y pone los valores por defecto -->
                {!! Form::model($user, array('route' => array('user.update', $user))) !!}


                <!-- Asimilia una peticion de tipo PUT-->
                <input type="hidden" name="_method" value="PUT">


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
                    )
                    )
                    !!}

                </div>


                <div class="form-group">
                    <label for="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" > Apellidos:</label>

                    {!!
                    Form::text(
                    'last_name',
                    null,
                    array(
                    'class' => 'from-control',
                    'required' => 'required',
                    'placeholder' => 'Ingresa los apellidos...',
                    )
                    )
                    !!}

                </div>


                <div class="form-group">
                    <label for="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" > Correo:</label>

                    {!!
                    Form::email(
                    'email',
                    null,
                    array(
                    'class' => 'from-control',
                    'required' => 'required',
                    'placeholder' => 'Ingresa el correo...',

                    )
                    )
                    !!}

                </div>

                <fieldset>
                    <legend>Cambiar Contraseña</legend>

                <div class="form-group">
                    <label for="password"> Nueva Contraseña:</label>

                    {!!
                    Form::password(
                    'password',
                    array(
                    'class' => 'from-control',
                    )
                    )
                    !!}

                </div>


                <div class="form-group">
                    <label for="confirm_password" > Confirmar Nueva Contraseña:</label>

                    {!!
                    Form::password(
                    'password_confirmation',
                    null,
                    array(
                    'class' => 'from-control',

                    )
                    )
                    !!}

                </div>
                </fieldset>


                <div class="row">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" required> Tipo</label>

                            {!! Form::radio('type', 'user', $user->type == 'user' ? true : false) !!} Usuario
                            <br>
                            {!! Form::radio('type', 'admin', $user->type == 'admin' ? true : false) !!} Administrador

                        </div>
                    </div>


                    <div class="col-md-7">

                        <div class="form-group">
                            <label for="user" class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" > Usuario:</label>

                            {!!
                            Form::text(
                            'user',
                            null,
                            array(
                            'class' => 'from-control',
                            'required' => 'required',
                            'placeholder' => 'Ingresa el usuario...',
                            'autofocus' => 'autofocus'
                            )
                            )
                            !!}

                        </div>

                    </div>

                </div>


                <div class="form-group">
                    <label for="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" > Dirección:</label>

                    {!!
                    Form::textarea(
                    'address',
                    null,
                    array(
                    'class' => 'from-control',
                    'required' => 'required',
                    )
                    )
                    !!}

                </div>

                <div class="row ">
                    <div class="col-md-5"></div>
                    <div class="col-md-1 ">

                        <div class="form-group">
                            <label for="active"> Activo:  </label>
                        </div>
                    </div>

                    <div class="col-md-2 ">
                        {!! Form::checkbox('active', null, $user->active == 1 ? true : false) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::submit('Actualizar', array('class' => 'btn btn-primary')) !!}
                    <a href="{{ route('user.index') }}" class="btn btn-warning"> Cancelar</a>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

</div>
@stop