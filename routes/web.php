<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorPaginas;
use App\Http\Controllers\Controlador_Productos;
use App\Http\Controllers\Controlador_Entrada;
use App\Http\Controllers\Controlador_Salida;
use App\Http\Controllers\Controlador_Personal;




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

#rutas del admin
Route::get('/empleado_admin',[ControladorPaginas::class,'fempleado_admin']) ->name('Jempleado_admin');
Route::get('/ubicacion_admin',[ControladorPaginas::class,'fubicacion_admin']) ->name('Jubicacion_admin');
Route::get('/almacen_admin',[ControladorPaginas::class,'falmacen_admin']) ->name('Jalmacen_admin');


/*Rutas Entrada */
Route::get('/entrada', function () {return view('entrada');});
Route::post('/entrada/create', [Controlador_Entrada::class, 'store'])->name('insertar_entrada');
Route::get('/entrada_index', [Controlador_Entrada::class, 'index'])->name('mostrar_entrada');
Route::get('/generar_pdf/{id_entrada}', [Controlador_Entrada::class, 'generarPDF'])->name('generar_pdf');

/*Rutas Salida */
Route::get('/salida', function () {return view('salida');});
Route::post('/salida/create', [Controlador_Salida::class, 'store'])->name('insertar_salida');
Route::get('/salida_index', [Controlador_Salida::class, 'index'])->name('mostrar_salida');
Route::get('/generar_pdf_salida/{id_salida}', [Controlador_Salida::class, 'generar_salida'])->name('generar_pdf_salida');


Route::get('/admin', function () {return view('admin');});

/*Rutas para productos */
Route::get('/productos',[Controlador_Productos::class,'fproducto']) ->name('Jproducto');
Route::post('/productos/create', [Controlador_Productos::class, 'store'])->name('insertar_producto');
Route::get('/productos_index', [Controlador_Productos::class, 'index'])->name('mostrar_producto');
Route::get('/productos/{id_producto}/edit', [Controlador_Productos::class, 'edit'])->name('editar_producto');
Route::put('/productos/{id_producto}',[Controlador_Productos::class,'update'])->name('update_producto');
Route::delete('/productos/{id_producto}',[Controlador_Productos::class, 'destroy'])->name('eliminar_producto');

/* Rutas para personal */
Route::get('/empleado_admin',[ControladorPaginas::class,'fempleado_admin']) ->name('Jempleado_admin');
Route::post('/empleado_admin/create', [Controlador_Personal::class, 'store'])->name('insertar_personal');
Route::get('/empleado_index', [Controlador_Personal::class, 'index'])->name('mostrar_personal');
Route::get('/empleado/{id_usuario}/edit', [Controlador_Personal::class, 'edit'])->name('editar_empleado');
Route::put('/empleado/{id_usuario}',[Controlador_Personal::class,'update'])->name('update_empleado');
Route::delete('/empleado/{id_usuario}',[Controlador_Personal::class, 'destroy'])->name('eliminar_empleado');

/*Inventario */
Route::get('/inventario/index', [Controlador_Productos::class, 'inventario'])->name('mostrar_inventario');


Route::get('/tareas', function () {return view('tareas');});

