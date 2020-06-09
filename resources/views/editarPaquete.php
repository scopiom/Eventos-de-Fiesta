<?php 
	use App\Http\Controllers\PaquetesController;

	$datosPaq = PaquetesController::verPaquete($idPaquete);
	$preciosPaq = PaquetesController::preciosPaquete($idPaquete);
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Salón de Fiestas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />


	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	
	<!-- Flaticons  -->
	<link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.html">Salón de Fiestas S8A</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="/">Página principal</a></li>
								<li><a href="/paquetes">Paquetes</a></li>
								<li><a href="/galeria">Galería</a></li>
								<?php 
									if (Session::has('nombre'))
									{
										if(session('tipousuario') == 3)
										{
											echo "<li><a href='/misEventos/".session('id')."'>Mis eventos</a></li>";
										}
										
										if(session('tipousuario') == 1)
										{
											echo "<li class='has-dropdown'>
													<a href='#ml'>Administrar</a>
													<ul class='dropdown'>
														<li><a href='#'>Clientes</a></li>
														<li><a href='#'>Empleados</a></li>
														<li><a href='/administrarPaquetes'>Paquetes</a></li>
														<li><a href='#'>Eventos</a></li>
													</ul>
												</li>";
										}																		
									}
								?>
								
								<?php 
									if (Session::has('nombre'))
									{
										echo "<li><a href='/logout'>Salir</a></li>";								
									}
									else
									{
										echo "<li><a href='/login'>Entrar</a></li>";
									} 
								?>												
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<?php
						echo "<li style='background-image: url(../images/paquete".$idPaquete."/".$datosPaq[0]->url.");'>";
					?>
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">				   					
				   					<h1>Edición</h1>
				   					<h2><?php echo $datosPaq[0]->nombre; ?></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<form action="/editarPaquete" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row form-group">
								<div class="col-md-6" id="idIdPaquete">
									<input name="idPaquete" type="text" id="idPaquete" class="form-control" 
									<?php echo "value='".$datosPaq[0]->idPaquete."'"; ?>>
								</div>
								<div class="col-md-6">
									<label for="fname">Nombre del paquete</label>
									<input name="nombre" type="text" id="nombre" class="form-control" placeholder="Nombre"
									<?php echo "value='".$datosPaq[0]->nombre."'"; ?>>
								</div>
								<div class="col-md-6">
									<label for="lname">Descripción</label>
									<input name="descripcion" type="text" id="descripcion" class="form-control" placeholder="Describe sobre lo que trata el paquete" <?php echo "value='".$datosPaq[0]->descripcion."'"; ?>>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Información</label>
									<textarea name="informacion" id="informacion" cols="30" rows="10" class="form-control">
										<?php echo $datosPaq[0]->informacion; ?>
									</textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-6">
									<label for="bname">Precio Básico</label>
									<input name="precioBasico" type="text" id="precioBasico" class="form-control" placeholder="Precio"
									<?php echo "value='".$preciosPaq[0]->precio."'"; ?>>
								</div>
								<div class="col-md-6">
									<label for="iname">Precio Intermedio</label>
									<input name="precioIntermedio" type="text" id="precioIntermedio" class="form-control" placeholder="Precio"
									<?php echo "value='".$preciosPaq[1]->precio."'"; ?>>
								</div>
								<div class="col-md-6">
									<label for="aname">Precio Avanzado</label>
									<input name="precioAvanzado" type="text" id="precioAvanzado" class="form-control" placeholder="Precio"
									<?php echo "value='".$preciosPaq[2]->precio."'"; ?>>
								</div>								
							</div>
								<br><input type='file' name='userFile1' id="userFile1"><br>
								<br><input type='file' name='userFile2' id="userFile2"><br>
								<br><input type='file' name='userFile3' id="userFile3"><br>
							<div class="form-group">
								<input type="submit" value="Guardar cambios" class="btn btn-primary">
							</div>
						</form>		
					</div>
				</div>
			</div>
		</div>
		
		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">				
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
     					<small class="block"><h2>S8A Framework
     						<script>
     							document.write(new Date().getFullYear());
     						</script></h2>
     						<br>Página creada por:
     						<br>Jorge Alberto Albores Jiménez - 16270221
     						<br>Itzayana Carolina Coutiño Guillen - 16270170
     						<br>Gerardo Alejandro Moreno Trujillo - 16271080
     					</small>
						</p>
					</div>
				</div>
			</div>
		</footer>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

	<script>
		document.getElementById("idIdPaquete").style.display = "none";
	</script>

	<script language="javascript" type="text/javascript">
		function getPath() 
		{
	     	var inputName = document.getElementById('userFile');
	     	var imgPath;

		    imgPath = inputName.value;
		    alert(imgPath);
		}
	</script>

	</body>
</html>

