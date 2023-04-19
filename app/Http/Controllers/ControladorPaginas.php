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
}
