<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Controlador_Ubicacion extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /* public function index()
    {
        $producto = DB::table('ubicacion')
            ->join('almacen', 'producto.almacen_id', '=', 'almacen.id_almacen')
            ->join('ubicacion', 'producto.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('producto.*', 'almacen.nombre_almacen as nombre_almacen', 'ubicacion.pasillo as nombre_pasillo')
            ->paginate(5);
        return view('tbproductos', ['producto' => $producto]);
    } */

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
        DB::table('ubicacion')->insert([
            "pasillo"=>$req->input('pasillo'),
            "racks"=>$req->input('racks'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);

        return redirect('/ubicacion_admin')->with('success', 'La ubicacion se ha guardado correctamente');
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
