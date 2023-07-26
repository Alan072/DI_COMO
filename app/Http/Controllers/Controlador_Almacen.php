<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controlador_Almacen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $almacen= DB::table('almacen')
        ->paginate(5);
        return view('tbalmacen', ['almacen' => $almacen]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/almacen_admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        DB::table('almacen')->insert([
            "nombre_almacen"=>$req->input('nombrealmacen'),
            "created_at"=> Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/almacen_admin')->with('mensaje','Tu recuerdo se ha guardado en la BD');
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
    public function edit(string $id_almacen)
    {
        $almacen = DB::table('almacen')->where('id_almacen', $id_almacen)->first();
        return view ('editar_almacen', ['almacen' => $almacen]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id_almacen)
    {
        DB::table('almacen')->where('id_almacen', $id_almacen)->update([
            "nombre_almacen"=>$req->input('nombrealmacen'),
            "created_at"=> Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/almacen_index')->with('mensaje','Tu recuerdo se ha guardado en la BD');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_almacen)
    {
        DB::table('almacen')->where('id_almacen',$id_almacen)->delete();
        return redirect('/almacen_index')->with('mensaje',"Recuerdo borrado");
    }
}
