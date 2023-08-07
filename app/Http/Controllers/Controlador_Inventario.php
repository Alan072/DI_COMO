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

    public function filtroA(Request $request)
    {
        // Obtén la cadena de búsqueda del parámetro 'q' en la URL
        $search = $request->input('q');

        // Consulta los productos y realiza la unión con las tablas de almacen y ubicacion
        $producto = DB::table('producto')
            ->join('almacen', 'producto.almacen_id', '=', 'almacen.id_almacen')
            ->join('ubicacion', 'producto.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('producto.*', 'almacen.nombre_almacen as nombre_almacen', 'ubicacion.pasillo as nombre_pasillo');

        // Aplica el filtro de búsqueda si se proporciona una cadena de búsqueda
        if ($search) {
            $producto->where('producto.nombre_producto', 'LIKE', '%' . $search . '%');
        }

        // Pagina los resultados
        $producto = $producto->paginate(5);

        return view('inventario', ['producto' => $producto]);
    }

    public function filtro(Request $request)
    {
        $producto = DB::table('producto')
            ->join('almacen', 'producto.almacen_id', '=', 'almacen.id_almacen')
            ->join('ubicacion', 'producto.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('producto.*', 'almacen.nombre_almacen as nombre_almacen', 'ubicacion.pasillo as nombre_pasillo');

        if ($request->has('buscar')) {
            $buscar = $request->buscar;
            $tipo_buscado = $request->buscar_por;

            if ($tipo_buscado == 'nombre') {
                $producto->where('nombre_producto', 'like', '%' . $buscar . '%');
            } elseif ($tipo_buscado == 'nombre_descripcion') {
                $producto->where('descripcion', 'like', '%' . $buscar . '%');
            } elseif ($tipo_buscado == 'nombre_stock') {
                $producto->where('stock', 'like', '%' . $buscar . '%');
            } elseif ($tipo_buscado == 'valor_precio') {
                $producto->where('precio', 'like', '%' . $buscar . '%');
            } elseif ($tipo_buscado == 'lugar_pasillo') {
                $producto->where('pasillo', 'like', '%' . $buscar . '%');
            } elseif ($tipo_buscado == 'lugar_almacen') {
                $producto->where('nombre_almacen', 'like', '%' . $buscar . '%');
            } elseif ($tipo_buscado == 'precio_total') {
                $producto->whereRaw('precio * stock LIKE ?', ['%' . $buscar . '%']);
            }
            
        }

        $producto = $producto->paginate(10);
        return view('inventario', compact('producto'));
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
