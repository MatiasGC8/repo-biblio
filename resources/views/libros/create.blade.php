@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Agregar Libro</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor:</label>
                            <input type="text" name="autor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="genero">Género:</label>
                            <input type="text" name="genero" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_publicacion">Fecha de Publicación:</label>
                            <input type="date" name="fecha_publicacion" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" name="imagen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sinopsis">Sinopsis:</label>
                            <textarea name="sinopsis" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
