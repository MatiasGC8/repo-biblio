@extends('layouts.app')

@section('content')
<div class="hero-container position-relative">
    <img src="{{ asset('img\hero-image.jpg') }}" alt="Hero Image" class="img-fluid w-100 hero-image">
    <div class="hero-overlay position-absolute w-100 h-100"></div>
    <div class="hero-text text-center text-white">
        <h1 class="display-3">Bienvenido a Book Spot</h1>
        <p class="lead">Explora nuestra vasta colección de libros</p>
    </div>
</div>

<div class="container mt-5">
    <!-- Tarjetas Interactivas -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center shadow-lg hover-card">
                <div class="card-body">
                    <h2 class="card-title">Gran Colección</h2>
                    <p class="card-text">Descubre una amplia variedad de géneros y títulos</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center shadow-lg hover-card">
                <div class="card-body">
                    <h2 class="card-title">Autores Famosos</h2>
                    <p class="card-text">Encuentra libros de tus autores favoritos</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center shadow-lg hover-card">
                <div class="card-body">
                    <h2 class="card-title">Fácil Acceso</h2>
                    <p class="card-text">Accede a tu biblioteca desde cualquier lugar</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de Libros -->
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Lista de Libros</h1>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        @foreach ($libros as $libro)
            <div class="col-md-4 mb-4 d-flex">
                <div class="card h-100 w-100">
                    @if ($libro->imagen)
                        <img src="{{ asset('storage/'.$libro->imagen) }}" class="card-img-top" alt="{{ $libro->titulo }}">
                    @else
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="No image available">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $libro->titulo }}</h5>
                        <p class="card-text"><strong>Autor:</strong> {{ $libro->autor }}</p>
                        <p class="card-text"><strong>Género:</strong> {{ $libro->genero }}</p>
                        <p class="card-text">{{ Str::limit($libro->sinopsis, 100) }}</p>
                        <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-info btn-sm mt-auto">Ver</a>
                        @auth
                            <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm mt-2">Editar</a>
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mt-2">Eliminar</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
.hero-container {
    position: relative;
    height: 400px;
}

.hero-image {
    height: 100%;
    object-fit: cover;
    opacity: 0.7;
}

.hero-overlay {
    background-color: rgba(0, 0, 0, 0.5); /* Black with opacity */
    top: 0;
    left: 0;
}

.hero-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: none;
    transition: transform 0.3s, box-shadow 0.3s;
}

.hover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card img {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.card-body {
    padding: 2rem;
    display: flex;
    flex-direction: column;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
</style>

@endsection
