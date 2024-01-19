<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;

class PruebaController extends Controller
{
    public function index()
    {
        //Buscar un registro por id de la tabla pruebas
        $prueba = Prueba::find(271);
        return response()->json($prueba, 200);
    }
}
