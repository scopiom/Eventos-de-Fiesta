<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GaleriaController extends Controller
{
    public static function todasFotos()
    {
    	$todasFotos = DB::select("select * from catalogodefotosdepaquetes;");
    	return $todasFotos;
    }
}
