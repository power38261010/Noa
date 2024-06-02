<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoServicioController;
use App\Http\Controllers\RubroController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\CondicionIvaController;

Route::get('/', function () {
    return view('main');
})->name('main');

Route::resource('productos-servicios', ProductoServicioController::class);

Route::resource('rubros', RubroController::class);
Route::resource('unidad-medidas', UnidadMedidaController::class);
Route::resource('condicion-ivas', CondicionIvaController::class);