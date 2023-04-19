<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Controlador_Productos extends Controller
{
    public function fproducto()
    {
     return view('productos');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $producto = DB::table('producto')->paginate(5); // Obtener los productos con paginación
        return view('tbproductos', ['producto' => $producto]);
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
            DB::table('producto')->insert([
                "nombre_producto"=>$req->input('nombre_producto'),
                "descripcion"=>$req->input('descripcion'),
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now(),
            ]);

            return redirect('/productos')->with('success', 'El producto se ha guardado correctamente');
        
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
    public function edit(string $id_producto)
    {
        //
        $producto = DB::table('producto')->where('id_producto', $id_producto)->first();
        return view ('editar_producto', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id_producto)
    {
        //
        DB::table('producto')->where('id_producto', $id_producto)->update([
            "nombre_producto"=>$req->input('nombre_producto'),
            "descripcion"=>$req->input('descripcion'),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/productos_index')->with('mensaje','Tu recuerdo se ha actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_producto)
    {
        //
        DB::table('producto')->where('id_producto',$id_producto)->delete();
        return redirect('/productos_index')->with('mensaje',"Recuerdo borrado");
    
    }
}
