<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoServicioController;
use App\Http\Controllers\RubroController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\CondicionIvaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('productos-servicios', ProductoServicioController::class); 
    Route::resource('rubros', RubroController::class);
    Route::resource('unidad-medidas', UnidadMedidaController::class);
    Route::resource('condicion-ivas', CondicionIvaController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';