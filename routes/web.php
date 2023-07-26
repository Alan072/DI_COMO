<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorPaginas;
use App\Http\Controllers\Controlador_Productos;
use App\Http\Controllers\Controlador_Entrada;
use App\Http\Controllers\Controlador_Salida;
use App\Http\Controllers\Controlador_Personal;
use App\Http\Controllers\Controlador_Ubicacion;
use App\Http\Controllers\Controlador_Almacen;
use App\Http\Controllers\Controlador_Tareas;
use App\Http\Controllers\Controlador_montacargas;
use App\Http\Controllers\LoginController;





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

Route::get('/home',[ControladorPaginas::class,'fhome']) ->name('Jhome');

#rutas del admin
Route::get('/empleado_admin',[ControladorPaginas::class,'fempleado_admin']) ->name('Jempleado_admin');

#Rutas de almacen
Route::get('/almacen_admin',[ControladorPaginas::class,'falmacen_admin']) ->name('Jalmacen_admin');
Route::post('/almacen', [Controlador_Almacen::class, 'store'])->name('CInsertadoal');
Route::get('/almacen_index', [Controlador_Almacen::class, 'index'])->name('mostrar_almacen');
Route::get('/almacen/{id_almacen}/edit', [Controlador_Almacen::class, 'edit'])->name('editar_almacen');
Route::put('/almacen/{id_almacen}',[Controlador_Almacen::class,'update'])->name('update_almacen');
Route::delete('/almacen/{id_almacen}',[Controlador_Almacen::class, 'destroy'])->name('eliminar_almacen');



#Rutas de ubicación
Route::get('/ubicacion_admin',[ControladorPaginas::class,'fubicacion_admin']) ->name('Jubicacion_admin');
Route::post('/ubicacion', [Controlador_Ubicacion::class, 'store'])->name('CInsertado');
Route::get('/ubicacion_index', [Controlador_Ubicacion::class, 'index'])->name('mostrar_ubicacion');
Route::get('/ubicacion/{id_ubicacion}/edit', [Controlador_Ubicacion::class, 'edit'])->name('editar_ubicacion');
Route::put('/ubicacion/{id_ubicacion}',[Controlador_Ubicacion::class,'update'])->name('update_ubicacion');
Route::delete('/ubicacion/{id_ubicacion}',[Controlador_Ubicacion::class, 'destroy'])->name('eliminar_ubicacion');


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

#Rutas para tareas
Route::get('/tareas', function () {return view('tareas');});
Route::post('/tarea', [Controlador_Tareas::class, 'store'])->name('CTarea_insertada');
Route::get('/tarea_index', [Controlador_Tareas::class, 'index'])->name('tarea_index');
Route::get('/tarea/{id_tarea}/edit', [Controlador_Tareas::class, 'edit'])->name('editar_tarea');
Route::put('/tarea/{id_tarea}',[Controlador_Tareas::class,'update'])->name('update_tarea');
Route::delete('/tarea/{id_tarea}',[Controlador_Tareas::class, 'destroy'])->name('eliminar_tarea');


/*Login */
Route::get('/',[ControladorPaginas::class,'flogin']) ->name('Jlogin');
Route::post('/como', [LoginController::class, 'login']);



/* Montacargas */
Route::get('/tarea_montacargas', [Controlador_montacargas::class, 'index'])->name('montacargas_index');


