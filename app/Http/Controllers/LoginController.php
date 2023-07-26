<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $tarea = DB::table('tarea')
            ->join('tipo_usuario', 'tarea.usuario_id', '=', 'tipo_usuario.id_usuario')
            ->join('ubicacion', 'tarea.ubicacion_id', '=', 'ubicacion.id_ubicacion')
            ->select('tarea.id_tarea', 'tarea.descripcion', 'tarea.salida_id', 'tarea.entrada_id', 'tipo_usuario.nombre', 'ubicacion.pasillo', 'ubicacion.racks')
            ->get(); 
        return view('vista_montacargas', ['tarea' => $tarea]);
    }

    public function login(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $password = $request->input('Password');
        $empleado = DB::table('tipo_usuario')->where('id_usuario', $id_usuario)->first();

        if ($empleado && $password == $empleado->contrasena) {
            if ($empleado->rol_desempena == 1) {
                return view('admin');
            } elseif ($empleado->rol_desempena == 2) {
                return redirect('/tarea_montacargas');
            }
            
        }

        return redirect()->back()->withErrors(['Matricula' => 'Las credenciales ingresadas son incorrectas']);
    }
}
