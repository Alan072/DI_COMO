<?php

namespace App\Http\Controllers;
use DB;
use Dompdf\Dompdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Controlador_Personal extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        DB::table('tipo_usuario')->insert([
            "nombre"=>$req->input('nombre'),
            "apellido_paterno"=>$req->input('apellido_paterno'),
            "apellido_materno"=>$req->input('apellido_materno'),
            "empresa"=>$req->input('empresa'),
            "direccion"=>$req->input('direccion'),
            "pais"=>$req->input('pais'),
            "correo"=>$req->input('correo'),
            "contrasena"=>$req->input('password'),
            "telefono_celular"=>$req->input('telefono_celular'),
            "telefono_fijo"=>$req->input('telefono_fijo'),
            "rol_desempena"=>$req->input('rol_desempena'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);

        return redirect('/empleado_admin')->with('success', 'El producto se ha guardado correctamente');
    

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
