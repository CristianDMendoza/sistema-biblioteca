<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;

class EstadisticaController extends Controller
{
    public function index()
    {
        $totalLibros     = Libro::count();
        $librosPrestados = Prestamo::count(); // simplificado
        $librosDisponibles = $totalLibros - $librosPrestados;

        return response()->json([
            'total_libros'      => $totalLibros,
            'libros_prestados'  => $librosPrestados,
            'libros_disponibles'=> $librosDisponibles,
        ]);
    }
}
