<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibroController extends Controller
{
    // Listar todos los libros
    public function index()
    {
        return response()->json(Libro::all());
    }

    // Crear un libro nuevo con validación
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'autor'  => 'required|string|max:255',
            'anio'   => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Error de validación',
                'errors'  => $validator->errors()
            ], 422);
        }

        $libro = Libro::create($request->all());
        return response()->json([
            'status'  => true,
            'message' => 'Libro creado correctamente',
            'data'    => $libro
        ], 201);
    }

    // Mostrar un libro específico
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return response()->json($libro);
    }

    // Actualizar un libro con validación
    public function update(Request $request, Libro $libro)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'autor'  => 'required|string|max:255',
            'anio'   => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Error de validación',
                'errors'  => $validator->errors()
            ], 422);
        }

        $libro->update($request->all());
        return response()->json([
            'status'  => true,
            'message' => 'Libro actualizado correctamente',
            'data'    => $libro
        ], 200);
    }

    // Eliminar un libro
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return response()->json([
            'status'  => true,
            'message' => 'Libro eliminado correctamente'
        ], 200);
    }
}
