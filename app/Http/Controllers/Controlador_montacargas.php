<?php

namespace App\Http\Controllers;
use DB;

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
            ->select('tarea.id_tarea', 'tarea.descripcion', 'tarea.salida_id', 'tarea.entrada_id', 'tipo_usuario.nombre', 'ubicacion.pasillo', 'ubicacion.racks')
            ->get(); 
        return view('vista_montacargas', ['tarea' => $tarea]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
