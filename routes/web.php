<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorPaginas;
use App\Http\Controllers\Controlador_Productos;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ControladorPaginas::class,'fhome']) ->name('Jhome');

Route::get('/entrada', function () {return view('entrada');});

Route::get('/salida', function () {return view('salida');});

Route::get('/admin', function () {return view('admin');});

/*Rutas para productos */
Route::get('/productos',[Controlador_Productos::class,'fproducto']) ->name('Jproducto');
Route::post('/productos/create', [Controlador_Productos::class, 'store'])->name('insertar_producto');
Route::get('/productos_index', [Controlador_Productos::class, 'index'])->name('mostrar_producto');
Route::get('/productos/{id_producto}/edit', [Controlador_Productos::class, 'edit'])->name('editar_producto');
Route::put('/productos/{id_producto}',[Controlador_Productos::class,'update'])->name('update_producto');
Route::delete('/productos/{id_producto}',[Controlador_Productos::class, 'destroy'])->name('eliminar_producto');


Route::get('/tareas', function () {return view('tareas');});

Route::get('/inventario', function () {return view('inventario');});