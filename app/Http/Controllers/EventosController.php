<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Redirect;

class EventosController extends Controller
{
    public static function datosMisEventos($idUsuario)
    {
    	$misEventos = DB::select("SELECT 
    				cde.descripcion, cde.fecha, cde.hora, cdp.descripcion as nombre, tp.descripcion as nivel, ede.descripcion as estado
    				FROM catalogodeeventos as cde
    				inner join estadosdeeventos as ede on(ede.tipo = cde.estado)
    				inner join catalogodepaquetes as cdp on(cdp.idPaquete = cde.idPaquete)    				
					inner join tiposdeprecios as tp on(tp.tipo = cde.tipoprecio)
					inner join precios as p on(p.idPaquete = cdp.idPaquete and p.tipo = cde.tipoprecio)
    				where cde.idUsuario = ".$idUsuario.";");

    	return $misEventos;
    }

    public static function datosEventos()
    {
    	$eventos = DB::select("SELECT 
    				u.nombre as nombreUsu, u.apellido, cde.descripcion, cde.fecha, cde.hora, cdp.descripcion as nombre, tp.descripcion as nivel, ede.descripcion as estado, cde.idEvento
    				FROM catalogodeeventos as cde
    				inner join estadosdeeventos as ede on(ede.tipo = cde.estado)
    				inner join catalogodepaquetes as cdp on(cdp.idPaquete = cde.idPaquete)    				
					inner join tiposdeprecios as tp on(tp.tipo = cde.tipoprecio)
					inner join precios as p on(p.idPaquete = cdp.idPaquete and p.tipo = cde.tipoprecio)
					inner join usuarios as u on(u.idUsuario = cde.idUsuario);");

    	return $eventos;
    }

    public static function guardarEvento()
    {
    	$idPaquete = $_POST['idPaquete'];
    	$idUsuario = $_POST['idUsuario'];
    	$descripcion = $_POST['descripcion'];
    	$fecha = $_POST['fecha'];
    	$hora = $_POST['hora'];
    	$tipo = $_POST['button'];

    	if($tipo == "Contratar paquete basico")
    		$tipo = "1";
    	else if($tipo == "Contratar paquete intermedio")
    		$tipo = "2";
    	else if($tipo == "Contratar paquete avanzado")
    		$tipo = "3";

    	$response4 = DB::INSERT("INSERT INTO catalogodeeventos(idUsuario, descripcion, fecha, hora, estado, tipoprecio, idPaquete)
    		VALUES ('".$idUsuario."', '".$descripcion."', '".$fecha."', '".$hora."', '1', '".$tipo."', '".$idPaquete."');");

    	return Redirect::to('/paquetes');
    }

    public static function modificar($idEvento, $estado)
    {
    	$response = DB::UPDATE("UPDATE catalogodeeventos SET estado= '".$estado."' 
    				WHERE catalogodeeventos.idEvento = ".$idEvento.";");

    	return Redirect::to('/administrarEventos');
    }
}