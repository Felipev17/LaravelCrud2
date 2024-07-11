<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UMedidaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PDFSalidaController;
use App\Http\Controllers\PDFIngresoController;
use App\Http\Controllers\RecetaController;



// Otras rutas...
Route::view('/', 'home')->name('home');

// Rutas para el recurso de Usuarios
Route::resource('usuarios', UsuariosController::class);

// Rutas para el recurso de Productos
Route::resource('productos', ProductosController::class);

// Rutas para el recurso de Roles
Route::resource('roles', RolesController::class);

// Rutas para el recurso de Unidades de Medida
Route::resource('umedida', UMedidaController::class);

// Rutas para el recurso de Tipo de Producto
Route::resource('tipo', TipoController::class);

// Rutas para el recurso de Salidas
Route::get('/salidas', [SalidaController::class, 'index'])->name('salidas.index');
Route::get('/salida/create', [SalidaController::class, 'create'])->name('salida.create');
Route::post('/salida', [SalidaController::class, 'store'])->name('salida.store');

// Rutas para el recurso de Ingresos
Route::get('/ingresos', [IngresoController::class, 'index'])->name('ingresos.index');
Route::get('/ingreso/create', [IngresoController::class, 'create'])->name('ingresos.create');
Route::post('/ingreso', [IngresoController::class, 'store'])->name('ingresos.store');
Route::get('/ingresos/search', [IngresoController::class, 'search'])->name('ingresos.search');

// Rutas para el recurso de Recetas

Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');

// Rutas para el recurso de PDF's

Route::get('/exportar-pdf', [PDFController::class, 'exportarPDF'])->name('pdf.exportar');
Route::get('/salidas/pdf', [PDFSalidaController::class, 'exportarPDF'])->name('salidas.pdf');
Route::get('/ingresos/pdf', [PDFIngresoController::class, 'exportarPDF'])->name('ingresos.pdf');


// Rutas de autenticación proporcionadas por Auth::routes()
Auth::routes();

