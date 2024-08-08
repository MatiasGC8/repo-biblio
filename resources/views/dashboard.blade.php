@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Dashboard</h1>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Crear Libro</h5>
                    <p class="card-text">Añadir un nuevo libro a la colección.</p>
                    <a href="{{ route('libros.create') }}" class="btn btn-primary btn-lg">Crear</a>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Editar Libro</h5>
                    <p class="card-text">Modificar la información de un libro existente.</p>
                    <button class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Eliminar Libro</h5>
                    <p class="card-text">Quitar un libro de la colección.</p>
                    <button class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Mis Libros</h2>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Género</th>
                        <th>Fecha de Publicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                        <tr>
                            <td>{{ $libro->id }}</td>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->autor }}</td>
                            <td>{{ $libro->genero }}</td>
                            <td>{{ $libro->fecha_publicacion }}</td>
                            <td>
                                <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal para seleccionar libro a editar -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Seleccionar Libro para Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td>{{ $libro->id }}</td>
                                <td>{{ $libro->titulo }}</td>
                                <td>
                                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para seleccionar libro a eliminar -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">Seleccionar Libro para Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td>{{ $libro->id }}</td>
                                <td>{{ $libro->titulo }}</td>
                                <td>
                                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
