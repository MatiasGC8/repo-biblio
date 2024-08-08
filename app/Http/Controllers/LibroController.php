<?php
namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'genero' => 'required',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sinopsis' => 'nullable|string',
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
        } else {
            $imagenPath = null;
        }

        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'genero' => $request->genero,
            'fecha_publicacion' => $request->fecha_publicacion,
            'imagen' => $imagenPath,
            'sinopsis' => $request->sinopsis,
        ]);

        return redirect()->route('libros.index')
                         ->with('success', 'Libro creado exitosamente.');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'genero' => 'required',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sinopsis' => 'nullable|string',
        ]);

        if ($request->hasFile('imagen')) {
            if ($libro->imagen) {
                Storage::disk('public')->delete($libro->imagen);
            }
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
        } else {
            $imagenPath = $libro->imagen;
        }

        $libro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'genero' => $request->genero,
            'fecha_publicacion' => $request->fecha_publicacion,
            'imagen' => $imagenPath,
            'sinopsis' => $request->sinopsis,
        ]);

        return redirect()->route('libros.index')
                         ->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy(Libro $libro)
    {
        if ($libro->imagen) {
            Storage::disk('public')->delete($libro->imagen);
        }

        $libro->delete();

        return redirect()->route('libros.index')
                         ->with('success', 'Libro eliminado exitosamente.');
    }
}
