@extends('admin.template')

@section('content')

<div class="container text-center">
    <div class="page-header">
        <h1>
            <i class="fa fa-shopping-cart"></i>
            CATEGORIAS <a href="{{ route('category.create') }}" class="btn btn-outline-success">
                <i class="fa fa-plus-circle"></i> Categoria</a>
        </h1>
    </div>

    <div class="page">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Color</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>


                        <a href="{{ route('category.edit', $category) }}" >

                            <i class="fa fa-pencil-square-o fa-2x"></i>
                        </a>
                    </td>
                    <td>
                        <!-- Debido a que es una petición de tipo DELETE se estructura como formulario -->
                        {!! Form::open(['route' => ['category.destroy', $category]]) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onclick="return confirm('¿Eliminar registro?')" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                        {!! Form::close() !!}
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->color }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop