<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controlador_Inventario extends Controller
{
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
        return view('inventario',  ['producto' => $producto]);
    }

    public function generarInventario()
    {
        // Obtiene toda la información de la tabla entrada
        $inventario = DB::table('producto')
            ->join('almacen', 'producto.almacen_id', '=', 'almacen.id_almacen')
            ->join('ubicacion', 'producto.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('producto.*', 'almacen.nombre_almacen as nombre_almacen', 'ubicacion.pasillo as nombre_pasillo')
            ->get();

        // Crea una instancia de Dompdf
        $pdf = new Dompdf();

        // Genera el PDF a partir de la vista entrada-pdf
        $pdf->loadHtml(view('inventario-pdf', compact('inventario'))->render());

        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Muestra el PDF en la vista
        return $pdf->stream('Inventario');
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
