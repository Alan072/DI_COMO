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
        $tipo_usuario = DB::table('tipo_usuario')
            ->join('rol_desempena', 'tipo_usuario.rol_desempena', '=', 'rol_desempena.id_rol')
            ->select('tipo_usuario.*', 'rol_desempena.nombre_rol as nombre_rol')
            ->paginate(5);
            return view('tbpersonal', ['tipo_usuario' => $tipo_usuario]);

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
    public function edit(string $id_usuario)
    {
        //
        $tipo_usuario = DB::table('tipo_usuario')->where('id_usuario', $id_usuario)->first();
        return view ('editar_empleado', ['tipo_usuario' => $tipo_usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id_usuario)
    {
        //
        //
        DB::table('tipo_usuario')->where('id_usuario', $id_usuario)->update([
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
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/empleado_index')->with('mensaje','Tu recuerdo se ha actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_usuario)
    {
        //
        DB::table('tipo_usuario')->where('id_usuario',$id_usuario)->delete();
        return redirect('/empleado_index')->with('mensaje',"Recuerdo borrado");
    }
}
