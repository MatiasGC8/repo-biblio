@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Editar Libro</h2>
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
                    <form action="{{ route('libros.update', $libro->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" class="form-control" value="{{ $libro->titulo }}" required>
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor:</label>
                            <input type="text" name="autor" class="form-control" value="{{ $libro->autor }}" required>
                        </div>
                        <div class="form-group">
                            <label for="genero">Género:</label>
                            <input type="text" name="genero" class="form-control" value="{{ $libro->genero }}" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_publicacion">Fecha de Publicación:</label>
                            <input type="date" name="fecha_publicacion" class="form-control" value="{{ $libro->fecha_publicacion }}" required>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" name="imagen" class="form-control">
                            @if ($libro->imagen)
                                <img src="{{ asset('storage/'.$libro->imagen) }}" class="img-fluid mt-2" width="200">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sinopsis">Sinopsis:</label>
                            <textarea name="sinopsis" class="form-control">{{ $libro->sinopsis }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
