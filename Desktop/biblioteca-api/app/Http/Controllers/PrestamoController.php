<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrestamoController extends Controller
{
    // Listar todos los préstamos
    public function index()
    {
        return response()->json(Prestamo::all());
    }

    // Crear un préstamo nuevo con validación
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'libro_id'        => 'required|exists:libros,id',
            'usuario'         => 'required|string|max:255',
            'fecha_prestamo'  => 'required|date',
            'fecha_devolucion'=> 'nullable|date|after_or_equal:fecha_prestamo',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Error de validación',
                'errors'  => $validator->errors()
            ], 422);
        }

        $prestamo = Prestamo::create($request->all());
        return response()->json([
            'status'  => true,
            'message' => 'Préstamo creado correctamente',
            'data'    => $prestamo
        ], 201);
    }

    // Mostrar un préstamo específico
    public function show($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return response()->json($prestamo);
    }

    // Actualizar un préstamo con validación
    public function update(Request $request, Prestamo $prestamo)
    {
        $validator = Validator::make($request->all(), [
            'libro_id'        => 'required|exists:libros,id',
            'usuario'         => 'required|string|max:255',
            'fecha_prestamo'  => 'required|date',
            'fecha_devolucion'=> 'nullable|date|after_or_equal:fecha_prestamo',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Error de validación',
                'errors'  => $validator->errors()
            ], 422);
        }

        $prestamo->update($request->all());
        return response()->json([
            'status'  => true,
            'message' => 'Préstamo actualizado correctamente',
            'data'    => $prestamo
        ], 200);
    }

    // Eliminar un préstamo
    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();
        return response()->json([
            'status'  => true,
            'message' => 'Préstamo eliminado correctamente'
        ], 200);
    }
}
