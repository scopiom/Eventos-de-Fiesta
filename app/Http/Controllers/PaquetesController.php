<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Redirect;

class PaquetesController extends Controller
{
    public static function datosPaquetes()
    {
    	$todosPaquetes = DB::select("select * from catalogodepaquetes as cdp 
			    		inner join catalogodefotosdepaquetes as cdf using(idPaquete) 
			    		where cdf.url = 'foto1.jpg';");

    	return $todosPaquetes;
    }

    public static function verPaquete($idPaquete)
    {
    	$datosPaquete = DB::select("select * from catalogodepaquetes as cdp 
			    		inner join catalogodefotosdepaquetes as cdf using(idPaquete) 
			    		where cdf.url = 'foto1.jpg' and cdp.idPaquete = ".$idPaquete.";");

    	return $datosPaquete;
    }

    public static function fotosPaquete($idPaquete)
    {
    	$fotosPaquete = DB::select("select * from catalogodefotosdepaquetes where idPaquete = ".$idPaquete.";");

    	return $fotosPaquete;
    }

    public static function editarPaquete()
    {
    	$idPaquete = $_POST['idPaquete'];
    	$nombre = $_POST['nombre'];
    	$descripcion = $_POST['descripcion'];
    	$informacion = $_POST['informacion'];

    	$precioBasico = $_POST['precioBasico'];
    	$precioIntermedio = $_POST['precioIntermedio'];
    	$precioAvanzado = $_POST['precioAvanzado'];

    	$response = DB::UPDATE("UPDATE catalogodepaquetes SET nombre= '".$nombre."', descripcion = '".$descripcion."', informacion = '".$informacion."' WHERE catalogodepaquetes.idPaquete = ".$idPaquete.";");

    	$response1 = DB::UPDATE("UPDATE precios SET precio = '".$precioBasico."' 
    				WHERE precios.idPaquete = ".$idPaquete." and precios.tipo = 1;");

    	$response2 = DB::UPDATE("UPDATE precios SET precio = '".$precioIntermedio."' 
    				WHERE precios.idPaquete = ".$idPaquete." and precios.tipo = 2;");

    	$response3 = DB::UPDATE("UPDATE precios SET precio = '".$precioAvanzado."' 
    				WHERE precios.idPaquete = ".$idPaquete." and precios.tipo = 3;");

        $file1 = basename($_FILES["userFile1"]["name"]);
        if($file1 != null)
        {
            $temp_name1 = $_FILES['userFile1']['tmp_name'];
            move_uploaded_file($temp_name1,"C:/xampp/htdocs/SalonDeEventos/public/images/paquete".$idPaquete."/".$file1);

            $response4 = DB::INSERT("INSERT INTO catalogodefotosdepaquetes(idPaquete, url) 
                        VALUES ('".$idPaquete."', '".$file1."');");
        }
    	
        $file2 = basename($_FILES["userFile2"]["name"]);
        if($file2 != null)
        {
            $temp_name2 = $_FILES['userFile2']['tmp_name'];
            move_uploaded_file($temp_name2,"C:/xampp/htdocs/SalonDeEventos/public/images/paquete".$idPaquete."/".$file2);

            $response5 = DB::INSERT("INSERT INTO catalogodefotosdepaquetes(idPaquete, url) 
                        VALUES ('".$idPaquete."', '".$file2."');");
        }

        $file3 = basename($_FILES["userFile3"]["name"]);
        if($file3 != null)
        {
            $temp_name3 = $_FILES['userFile3']['tmp_name'];
            move_uploaded_file($temp_name3,"C:/xampp/htdocs/SalonDeEventos/public/images/paquete".$idPaquete."/".$file3);

            $response6 = DB::INSERT("INSERT INTO catalogodefotosdepaquetes(idPaquete, url) 
                        VALUES ('".$idPaquete."', '".$file3."');");
        }

    	$paquete = array("idPaquete" => $idPaquete);

    	return Redirect::to('/paquetes');
    }

    public static function preciosPaquete($idPaquete)
    {
    	$datosPrecios = DB::select("SELECT tp.descripcion, p.precio FROM catalogodepaquetes as cdp 
						inner join precios as p using(idPaquete)
						inner join tiposdeprecios as tp on(tp.tipo = p.tipo)
						where cdp.idPaquete = ".$idPaquete.";");

    	return $datosPrecios;
    }

    public static function guardarPaquete()
    {
    	$nombre = $_POST['nombre'];
    	$descripcion = $_POST['descripcion'];
    	$informacion = $_POST['informacion'];

    	$precioBasico = $_POST['precioBasico'];
    	$precioIntermedio = $_POST['precioIntermedio'];
    	$precioAvanzado = $_POST['precioAvanzado'];

    	$response = DB::INSERT("INSERT INTO catalogodepaquetes(nombre, descripcion, informacion) VALUES ('".$nombre."', '".$descripcion."', '".$informacion."');");

    	$datosPaquete = DB::select("select idPaquete from catalogodepaquetes 
    					where nombre = '".$nombre."' and descripcion = '".$descripcion."';");

    	$response1 = DB::INSERT("INSERT INTO precios(idPaquete, precio, tipo) VALUES ('".$datosPaquete[0]->idPaquete."', '".$precioBasico."', '1');");

    	$response2 = DB::INSERT("INSERT INTO precios(idPaquete, precio, tipo) VALUES ('".$datosPaquete[0]->idPaquete."', '".$precioIntermedio."', '2');");

    	$response3 = DB::INSERT("INSERT INTO precios(idPaquete, precio, tipo) VALUES ('".$datosPaquete[0]->idPaquete."', '".$precioAvanzado."', '3');");

        mkdir("C:/xampp/htdocs/SalonDeEventos/public/images/paquete".$datosPaquete[0]->idPaquete, 0700);

        $file1 = basename($_FILES["userFile1"]["name"]);
        if($file1 != null)
        {
            $temp_name1 = $_FILES['userFile1']['tmp_name'];
            move_uploaded_file($temp_name1,"C:/xampp/htdocs/SalonDeEventos/public/images/paquete".$datosPaquete[0]->idPaquete."/foto1.jpg");

            $response4 = DB::INSERT("INSERT INTO catalogodefotosdepaquetes(idPaquete, url) 
                        VALUES ('".$datosPaquete[0]->idPaquete."', 'foto1.jpg');");
        }
        
        $file2 = basename($_FILES["userFile2"]["name"]);
        if($file2 != null)
        {
            $temp_name2 = $_FILES['userFile2']['tmp_name'];
            move_uploaded_file($temp_name2,"C:/xampp/htdocs/SalonDeEventos/public/images/paquete".$datosPaquete[0]->idPaquete."/".$file2);

            $response5 = DB::INSERT("INSERT INTO catalogodefotosdepaquetes(idPaquete, url) 
                        VALUES ('".$datosPaquete[0]->idPaquete."', '".$file2."');");
        }

        $file3 = basename($_FILES["userFile3"]["name"]);
        if($file3 != null)
        {
            $temp_name3 = $_FILES['userFile3']['tmp_name'];
            move_uploaded_file($temp_name3,"C:/xampp/htdocs/SalonDeEventos/public/images/paquete".$datosPaquete[0]->idPaquete."/".$file3);

            $response6 = DB::INSERT("INSERT INTO catalogodefotosdepaquetes(idPaquete, url) 
                        VALUES ('".$datosPaquete[0]->idPaquete."', '".$file3."');");
        }

    	return Redirect::to('/paquetes');
    }
}
