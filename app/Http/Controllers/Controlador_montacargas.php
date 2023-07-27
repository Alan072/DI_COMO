<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class Controlador_montacargas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $tarea = DB::table('tarea')
            ->join('tipo_usuario', 'tarea.usuario_id', '=', 'tipo_usuario.id_usuario')
            ->join('ubicacion', 'tarea.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('tarea.id_tarea','tarea.status_tarea', 'tarea.descripcion', 'tarea.salida_id', 'tarea.entrada_id', 'tipo_usuario.nombre', 'ubicacion.pasillo', 'ubicacion.racks')
            ->where('tarea.status_tarea', 'No Completado') // Agrega esta condición para filtrar por status_tarea
            ->get();

        return view('vista_montacargas', ['tarea' => $tarea]);
    }

    public function index_completas()
    {
            $tarea = DB::table('tarea')
            ->join('tipo_usuario', 'tarea.usuario_id', '=', 'tipo_usuario.id_usuario')
            ->join('ubicacion', 'tarea.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('tarea.id_tarea','tarea.status_tarea', 'tarea.descripcion', 'tarea.salida_id', 'tarea.entrada_id', 'tipo_usuario.nombre', 'ubicacion.pasillo', 'ubicacion.racks')
            ->where('tarea.status_tarea', 'Completado') // Agrega esta condición para filtrar por status_tarea
            ->get();

        return view('tareas_completas', ['tarea' => $tarea]);
    }

    public function marcarComoCompletado(Request $request)
    {
        $tareaId = $request->input('tareaId');

        // Ejecutar la consulta para actualizar el campo 'status_tarea' a 'Completado'
        $resultado = DB::table('tarea')
            ->where('id_tarea', $tareaId)
            ->update(['status_tarea' => 'Completado']);

        if ($resultado) {
            return response()->json(['message' => 'Tarea marcada como completada correctamente'], 200);
        }

        return response()->json(['message' => 'No se encontró la tarea o no se pudo actualizar'], 404);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Obtener los detalles de una tarea específica por su ID desde la base de datos
    $tareaDetalle = DB::table('tarea')
    ->join('tipo_usuario', 'tarea.usuario_id', '=', 'tipo_usuario.id_usuario')
    ->join('ubicacion', 'tarea.ubicacion_id', '=', 'ubicacion.id_ubicacion')
    ->select('tarea.id_tarea', 'tarea.status_tarea', 'tarea.descripcion', 'tarea.salida_id', 'tarea.entrada_id', 'tipo_usuario.nombre', 'ubicacion.pasillo', 'ubicacion.racks')
    ->where('tarea.id_tarea', $id)
    ->where('tarea.status_tarea', 'No Completado') // Agrega esta condición para filtrar por status_tarea
    ->first();

    // Verificar si se encontró la tarea
    if ($tareaDetalle) {
        // Pasar los detalles de la tarea a la vista para mostrarlos
        return view('tareas_montacargas', ['tareaDetalle' => $tareaDetalle]);
    } else {
        // Si no se encontró la tarea, redirigir o mostrar una vista de error
        return redirect()->route('montacargas_index')->with('error', 'Tarea no encontrada');
    }
}

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_tarea)
    {
        //
        $tarea = DB::table('tarea')->where('id_tarea', $id_tarea)->first();
        return view('tareas_montacargas', ['tarea' => $tarea]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id_tarea)
    {
        //
        DB::table('tarea')->where('id_tarea', $id_tarea)->update([
            "descripcion" => $req->input('descripcion'),
            "salida_id" => $req->input('idsalida'),
            "usuario_id" => $req->input('idusuario'),
            "ubicacion_id" => $req->input('idubicacion'),
            "entrada_id" => $req->input('identrada'),
            "updated_at" => Carbon::now(),
        ]);
        return redirect('/tarea_montacargas')->with('mensaje', 'Tu recuerdo se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
