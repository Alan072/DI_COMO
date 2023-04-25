<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controlador_Admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol= DB::table('rol_desempena')
        ->paginate(5);
        return view('admin', ['rol' => $rol]);
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
    public function store(Request $req)
    {
        DB::table('rol_desempena')->insert([
            "id_rol" => $req->input('id_rol'),
            "nombre_rol" => $req->input('nombre_rol'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        return redirect('/agregar_rol')->with('success', 'El producto se ha guardado correctamente');
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
    public function edit(string $id_rol)
    {
        $rol = DB::table('rol_desempena')->where('id_rol', $id_rol)->first();
        return view ('editar_rol', ['rol' => $rol]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id_rol)
    {
        DB::table('rol_desempena')->where('id_rol', $id_rol)->update([
            "id_rol" => $req->input('id_rol'),
            "nombre_rol" => $req->input('nombre_rol'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return redirect('/admin')->with('mensaje','Tu recuerdo se ha guardado en la BD');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_rol)
    {
        DB::table('rol_desempena')->where('id_rol',$id_rol)->delete();
        return redirect('/admin')->with('mensaje',"Recuerdo borrado");
    }
}
