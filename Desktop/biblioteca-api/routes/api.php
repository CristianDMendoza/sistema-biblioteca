<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;

Route::apiResource('libros', LibroController::class);
Route::apiResource('prestamos', PrestamoController::class);

// Ruta directa para estadísticas
Route::get('/estadisticas', function () {
    return response()->json([
        'total_libros' => \App\Models\Libro::count(),
        'libros_disponibles' => \App\Models\Libro::where('disponible', true)->count(),
        'libros_prestados' => \App\Models\Libro::where('disponible', false)->count(),
        'total_prestamos' => \App\Models\Prestamo::count(),
    ]);
});
