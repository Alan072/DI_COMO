<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controlador_Tareas extends Controller
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
            ->paginate(5);
        return view('tbtareas', ['tarea' => $tarea]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/tareas');
    }

    /**
     * Store a newly created resource in storage.
     */
    /*   public function store(Request $req)
    {
        DB::table('tarea')->insert([
            "descripcion"=>$req->input('descripcion'),
            "salida_id"=>$req->input('idsalida'),
            "usuario_id"=>$req->input('idusuario'),
            "ubicacion_id"=>$req->input('idubicacion'),
            "entrada_id"=>$req->input('identrada'),
            "created_at"=> Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/tareas')->with('mensaje','Tu recuerdo se ha guardado en la BD');
    } */
    public function store(Request $req)
    {
        /* dd($req->all()); */
        $data = [
            "descripcion" => $req->input('descripcion'),
            "usuario_id" => $req->input('idusuario'),
            "ubicacion_id" => $req->input('idubicacion'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ];

        if (isset($req->idsalida)) {
            $data["salida_id"] = $req->input('idsalida');
        }

        if (isset($req->identrada)) {
            $data["entrada_id"] = $req->input('identrada');
        }

        DB::table('tarea')->insert($data);
        return redirect('/tareas')->with('mensaje', 'Tu recuerdo se ha guardado en la BD');
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
    public function edit(string $id_tarea)
    {
        //
        $tarea = DB::table('tarea')->where('id_tarea', $id_tarea)->first();
        return view('editar_tarea', ['tarea' => $tarea]);
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
        return redirect('/tarea_index')->with('mensaje', 'Tu recuerdo se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tarea)
    {
        //
        DB::table('tarea')->where('id_tarea', $id_tarea)->delete();
        return redirect('/tarea_index')->with('mensaje', "Recuerdo borrado");
    }
}
