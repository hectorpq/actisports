<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DisenoController;

use App\Http\Controllers\ContactoController;

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');


Route::get('/', function () {
    return view('menu');  // Puedes redirigir a la página de inicio
})->name('home');

// Rutas para los diseños
Route::resource('disenos', DisenoController::class);


Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen');

Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen');
Route::post('/almacen', [AlmacenController::class, 'store'])->name('almacen.store');

Route::get('/', [MainController::class, 'index']);


Route::get('/disenos', [DisenoController::class, 'index'])->name('disenos.index');

Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen');
Route::resource('disenos', DisenoController::class);

Route::get('/diseno', [DisenoController::class, 'index'])->name('diseno.index');
Route::post('/diseno', [DisenoController::class, 'store'])->name('diseno.store');


// Rutas para editar y actualizar materiales


Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen.index');



Route::delete('/almacen/{id}', [AlmacenController::class, 'destroy'])->name('almacen.destroy');


// Ruta principal del almacén
Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen');

// Rutas para las operaciones CRUD
Route::post('/almacen', [AlmacenController::class, 'store'])->name('almacen.store');
Route::get('/almacen/{id}/edit', [AlmacenController::class, 'edit'])->name('almacen.edit');
Route::put('/almacen/{id}', [AlmacenController::class, 'update'])->name('almacen.update');
Route::get('/disenos', [DisenoController::class, 'index'])->name('disenos.index');

Route::get('/', function () {
    return view('menu');  // Puedes redirigir a la página de inicio
})->name('home');

// Rutas para los diseños
Route::resource('disenos', DisenoController::class);

// Rutas para el almacén
Route::resource('almacen', AlmacenController::class);
Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen');
// routes/web.php
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
