<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

// Ruta principal redirige a la lista de libros
Route::get('/', [LibroController::class, 'index'])->name('libros.index');

// Rutas de autenticación
require __DIR__.'/auth.php';

// Rutas accesibles para todos los usuarios (libros index y show)
Route::resource('libros', LibroController::class)->only([
    'index', 'show'
]);

// Rutas accesibles solo para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $libros = \App\Models\Libro::all();
        return view('dashboard', compact('libros'));
    })->name('dashboard');

    Route::resource('libros', LibroController::class)->except([
        'index', 'show'
    ]);
});

