<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorPaginas extends Controller
{
    //

    public function fhome()
    {
        return view('home');
    }

    public function fproducto()
    {
        return view('productos');
    }

    public function fproveedor_admin()
    {
        return view('proveedor_admin');
    }

    public function fcliente_admin()
    {
        return view('cliente_admin');
    }

    public function fempleado_admin()
    {
        return view('empleado_admin');
    }

    public function fubicacion_admin()
    {
        return view('ubicacion_admin');
    }

    public function falmacen_admin()
    {
        return view('almacen_admin');
    }
}
