<?php

namespace App\Http\Controllers;
use DB;
use Dompdf\Dompdf;
use Carbon\Carbon;

use Illuminate\Http\Request;

class Controlador_Entrada extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $entrada = DB::table('entrada')
            ->join('producto', 'entrada.producto_id', '=', 'producto.id_producto')
            ->join('almacen', 'producto.almacen_id', '=', 'almacen.id_almacen')
            ->join('ubicacion', 'producto.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('entrada.*', 'producto.nombre_producto as nombre_producto', 'almacen.nombre_almacen as nombre_almacen', 'ubicacion.pasillo as nombre_pasillo')
            ->paginate(5);
            return view('tbentrada', ['entrada' => $entrada]);

    }

    public function generarPDF($id_entrada)
    {

        // Obtiene la información del ticket
        $entrada = DB::table('entrada')
            ->join('producto', 'entrada.producto_id', '=', 'producto.id_producto')
            ->join('almacen', 'producto.almacen_id', '=', 'almacen.id_almacen')
            ->join('ubicacion', 'producto.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('entrada.*', 'producto.nombre_producto as nombre_producto', 'almacen.nombre_almacen as nombre_almacen', 'ubicacion.pasillo as nombre_pasillo')
            ->where('id_entrada', $id_entrada)
            ->first();

        // Genera el HTML para el PDF
        $html = '<h1>Información de la Entrada</h1>';
        $html .= '<p>ID: ' . $entrada->id_entrada . '</p>';
        $html .= '<p>Producto: ' . $entrada->nombre_producto . '</p>';
        $html .= '<p>Cantidad: ' . $entrada->cantidad . '</p>';
        
        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();
        // Genera el PDF a partir del HTML
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Descarga el PDF en el navegador
        $dompdf->stream('Reporte_salida.pdf');
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
        //
        DB::table('entrada')->insert([
            "producto_id"=>$req->input('producto_id'),
            "cantidad"=>$req->input('cantidad'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);

        return redirect('/entrada')->with('success', 'El producto se ha guardado correctamente');
    
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
