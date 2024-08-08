@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-center">
                    <h2>{{ $libro->titulo }}</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>Autor:</strong>
                        {{ $libro->autor }}
                    </div>
                    <div class="form-group">
                        <strong>Género:</strong>
                        {{ $libro->genero }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha de Publicación:</strong>
                        {{ $libro->fecha_publicacion }}
                    </div>
                    <div class="form-group">
                        <strong>Imagen:</strong>
                        @if ($libro->imagen)
                            <img src="{{ asset('storage/'.$libro->imagen) }}" class="img-fluid" width="200">
                        @else
                            No hay imagen disponible.
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Sinopsis:</strong>
                        <p>{{ $libro->sinopsis }}</p>
                    </div>
                    <a href="{{ route('libros.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
