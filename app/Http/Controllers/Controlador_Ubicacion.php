<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controlador_Ubicacion extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ubicacion= DB::table('ubicacion')
        ->paginate(5);
        return view('tb_ubicacion', ['ubicacion' => $ubicacion]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/ubicacion_admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        DB::table('ubicacion')->insert([
            "pasillo"=>$req->input('pasillo'),
            "racks"=>$req->input('rack'),
            "created_at"=> Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/ubicacion_index')->with('mensaje','Tu recuerdo se ha guardado en la BD');
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
    public function edit(string $id_ubicacion)
    {
        $ubicacion = DB::table('ubicacion')->where('id_ubicacion', $id_ubicacion)->first();
        return view ('editar_ubicacion', ['ubicacion' => $ubicacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id_ubicacion)
    {
        DB::table('ubicacion')->update([
            "pasillo"=>$req->input('pasillo'),
            "racks"=>$req->input('rack'),
            "created_at"=> Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/ubicacion_index')->with('mensaje','Tu recuerdo se ha guardado en la BD');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_ubicacion)
    {
        DB::table('ubicacion')->where('id_ubicacion',$id_ubicacion)->delete();
        return redirect('/ubicacion_index')->with('mensaje',"Recuerdo borrado");
    }
}
