<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorPaginas;
use App\Http\Controllers\Controlador_Admin;
use App\Http\Controllers\Controlador_Inventario;
use App\Http\Controllers\Controlador_Productos;
use App\Http\Controllers\Controlador_Ubicacion;
use App\Http\Controllers\Controlador_Entrada;
use App\Http\Controllers\Controlador_Salida;
use App\Http\Controllers\Controlador_Personal;
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

#Rutas del personal
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
Route::get('/generar_pdf_entrada/{id_entrada}', [Controlador_Entrada::class, 'generarPDF'])->name('generar_pdf_entrada');
Route::get('/generar_pdf_entradas', [Controlador_Entrada::class, 'generarEntradas'])->name('generar_pdf_entradas');

/*Rutas Salida */
Route::get('/salida', function () {return view('salida');});
Route::post('/salida/create', [Controlador_Salida::class, 'store'])->name('insertar_salida');
Route::get('/salida_index', [Controlador_Salida::class, 'index'])->name('mostrar_salida');
Route::get('/generar_pdf_salida/{id_salida}', [Controlador_Salida::class, 'generarPDF'])->name('generar_pdf_salida');
Route::get('/generar_pdf_salidas', [Controlador_Salida::class, 'generarSalidas'])->name('generar_pdf_salidas');

#Rutas del admin
Route::get('/admin', [Controlador_Admin::class, 'index'])->name('mostrar_rol');
Route::put('/admin', [Controlador_Admin::class, 'index'])->name('mostrar_rol_c');

Route::get('/agregar_rol', function () {return view('agregar_rol');})->name('agregar_rol');
Route::post('/agregar_rol', function () {return view('agregar_rol');})->name('agregar_rol_c'); 
Route::post('/agregar_rol', [Controlador_Admin::class, 'store'])->name('insertar_rol');  

Route::get('/rol/{id_rol}/edit', [Controlador_Admin::class, 'edit'])->name('editar_rol');
Route::put('/rol/{id_rol}',[Controlador_Admin::class,'update'])->name('update_rol');
Route::delete('/rol/{id_rol}',[Controlador_Admin::class, 'destroy'])->name('eliminar_rol');  

/*Rutas para productos */
Route::get('/productos',[Controlador_Productos::class,'fproducto']) ->name('Jproducto');
Route::post('/productos/create', [Controlador_Productos::class, 'store'])->name('insertar_producto');
Route::get('/productos_index', [Controlador_Productos::class, 'index'])->name('mostrar_producto');
Route::get('/productos/{id_producto}/edit', [Controlador_Productos::class, 'edit'])->name('editar_producto');
Route::put('/productos/{id_producto}',[Controlador_Productos::class,'update'])->name('update_producto');
Route::delete('/productos/{id_producto}',[Controlador_Productos::class, 'destroy'])->name('eliminar_producto');
Route::get('/generar_pdf_productos', [Controlador_Productos::class, 'generarProductos'])->name('generar_pdf_productos');

/* Rutas para personal */
Route::get('/empleado_admin',[ControladorPaginas::class,'fempleado_admin']) ->name('Jempleado_admin');
Route::post('/empleado_admin/create', [Controlador_Personal::class, 'store'])->name('insertar_personal');
Route::get('/empleado_index', [Controlador_Personal::class, 'index'])->name('mostrar_personal');
Route::get('/empleado/{id_usuario}/edit', [Controlador_Personal::class, 'edit'])->name('editar_empleado');
Route::put('/empleado/{id_usuario}',[Controlador_Personal::class,'update'])->name('update_empleado');
Route::delete('/empleado/{id_usuario}',[Controlador_Personal::class, 'destroy'])->name('eliminar_empleado');

/* Rutas para clientes */
Route::get('/cliente',[ControladorPaginas::class,'fcliente_admin']) ->name('cliente');

/*Inventario */
Route::get('/inventario/index', [Controlador_Inventario::class, 'index'])->name('mostrar_inventario');
Route::get('/inventario/filtro', [Controlador_Inventario::class, 'filtro'])->name('mostrar_filtro_inventario');
Route::get('/generar_pdf_inventario', [Controlador_Inventario::class, 'generarInventario'])->name('generar_pdf_inventario');

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
Route::get('/tareas_completas', [Controlador_montacargas::class, 'index_completas'])->name('completas_index');

Route::put('/tarea_montacargas/{id_tarea}',[Controlador_montacargas::class,'update'])->name('update_tareaM');
Route::get('/tarea_montacargas/{id_tarea}/edit', [Controlador_montacargas::class, 'edit'])->name('editar_tareaM');
Route::get('/tarea_montacargas/{id_tarea}/show', [Controlador_montacargas::class, 'show'])->name('show_tareaM');
Route::post('/marcar_como_completado', [Controlador_montacargas::class, 'marcarComoCompletado']);


