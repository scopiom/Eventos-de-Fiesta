<!DOCTYPE html>
<?php

use App\Http\Controllers\UsuariosController;

session_start();

	$correo=$_POST['correo'];
	$pass=$_POST['contra'];

	$datosUsu = UsuariosController::datosUsuario($correo, $pass);

	if(sizeof($datosUsu) > 0)
	{
		$datosUsu[0]->idUsuario

		$_SESSION['id']=$datosUsu[0]->idUsuario;
		$_SESSION['nombre']=$datosUsu[0]->nombre;
		$_SESSION['apellido']=$datosUsu[0]->apellido;
		$_SESSION['correo']=$datosUsu[0]->correo;
		$_SESSION['apellido']=$datosUsu[0]->apellido;
		$_SESSION['tipousuario']=$datosUsu[0]->tipousuario;

		echo "<script>location.href='/'</script>";
	}
	else
	{
		echo '<script>alert("Datos incorrectos")</script> ';
	}




/*	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM usuarios WHERE nombre='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['pasadmin']){
			$_SESSION['id']=$f2['id'];
			$_SESSION['nombre']=$f2['nombre'];
			$_SESSION['rol']=$f2['rol'];

			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='admin.php'</script>";
		
		}
	}


	$sql=mysqli_query($mysqli,"SELECT * FROM usuarios WHERE nombre='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['password']){
			$_SESSION['id']=$f['id'];
			$_SESSION['nombre']=$f['nombre'];
			$_SESSION['rol']=$f['rol'];

			header("Location: sesion.php");
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='index.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	}*/

?>


<html>
<head>
	<title>Cargando</title>
</head>
<body background="images/fondo/carga.jpg">

</body>
</html>