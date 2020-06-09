<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class UsuariosController extends Controller
{
    public static function datosUsuario()
    {
    	$correo = $_POST['correo'];
    	$pass = $_POST['contra'];

    	$datosUsu = DB::select("select * from usuarios as usu 
		    		inner join tiposdeusuarios as tdu on(tdu.tipo = usu.tipousuario)
		    		where usu.correo = '".$correo."' and usu.password = '".$pass."';");

    	if(sizeof($datosUsu) > 0)
		{
			session(['id' => $datosUsu[0]->idUsuario]);
			session(['nombre' => $datosUsu[0]->nombre]);
			session(['apellido' => $datosUsu[0]->apellido]);
			session(['correo' => $datosUsu[0]->correo]);
			session(['tipousuario' => $datosUsu[0]->tipousuario]);

			return Redirect::to('/');
		}
    	
    	return Redirect::to('/login');
    }

    public static function logout()
    {
    	Session::flush();

    	return Redirect::to('/');
    }
}
