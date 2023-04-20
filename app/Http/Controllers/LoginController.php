<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $password = $request->input('Password');
        $empleado = DB::table('tipo_usuario')->where('id_usuario', $id_usuario)->first();

        if ($empleado && $password == $empleado->contrasena) {
            if ($empleado->rol_desempena == 1) {
                return view('admin');
            } elseif ($empleado->rol_desempena == 2) {
                return view('vista_montacargas');
            }
        }

        return redirect()->back()->withErrors(['Matricula' => 'Las credenciales ingresadas son incorrectas']);
    }
}
