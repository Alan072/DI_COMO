<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $producto = DB::table('producto')
            ->join('almacen', 'producto.almacen_id', '=', 'almacen.id_almacen')
            ->join('ubicacion', 'producto.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('producto.*', 'almacen.nombre_almacen as nombre_almacen', 'ubicacion.pasillo as nombre_pasillo')
            ->paginate(5);
        return view('tbproductos', ['producto' => $producto]);
    }

    public function generarProductos()
    {
        // Obtiene toda la información de la tabla entrada
        $productos = DB::table('producto')
            ->join('almacen', 'producto.almacen_id', '=', 'almacen.id_almacen')
            ->join('ubicacion', 'producto.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('producto.*', 'almacen.nombre_almacen as nombre_almacen', 'ubicacion.pasillo as nombre_pasillo')
            ->get();

        // Crea una instancia de Dompdf
        $pdf = new Dompdf();

        // Genera el PDF a partir de la vista entrada-pdf
        $pdf->loadHtml(view('productos-pdf', compact('productos'))->render());

        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Muestra el PDF en la vista
        return $pdf->stream('Productos');
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
            "nombre_producto" => $req->input('nombre_producto'),
            "descripcion" => $req->input('descripcion'),
            "precio" => $req->input('precio'),
            "ubicacion_id" => $req->input('ubicacion_id'),
            "almacen_id" => $req->input('almacen_id'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
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
        return view('editar_producto', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id_producto)
    {
        //
        DB::table('producto')->where('id_producto', $id_producto)->update([
            "nombre_producto" => $req->input('nombre_producto'),
            "descripcion" => $req->input('descripcion'),
            "precio" => $req->input('precio'),
            "ubicacion_id" => $req->input('ubicacion_id'),
            "almacen_id" => $req->input('almacen_id'),
            "updated_at" => Carbon::now(),
        ]);
        return redirect('/productos_index')->with('mensaje', 'Tu recuerdo se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_producto)
    {
        //
        DB::table('producto')->where('id_producto', $id_producto)->delete();
        return redirect('/productos_index')->with('mensaje', "Recuerdo borrado");
    }
}
