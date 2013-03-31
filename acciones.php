<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	
	?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>Acciones</title>
		<link href="./css/estilos.css" rel="stylesheet" media="screen" />
		<link href="./css/imprimir.css" rel="stylesheet" media="print" />
		<link href="./css/movil.css" rel="stylesheet" media="handheld , only screen and (max-device-width: 480px)" />
		<!-- Compatibilidad con Elementos HTML5 -->
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
			</script>
		<![endif]-->
		<script	src="./jscript/shared/js/modernizr.com/Modernizr-2.5.3.forms.js"></script>		
		<script data-webforms2-support="validation,range,date" data-lang="es" src="./jscript/shared/js/html5Forms.js"></script>
	</head>
	
	<body>
		<div>
			<header>
				<h1>Bazar Evy - Sistema de Compras y Abonos </h1>	
				<h2>Acciones permitidas</h2>
			</header>
			<section >
				<div class="opcion"><a href="cliente.php?accion=1">Registrar</br>Compra</a></div>
				<div class="opcion"><a href="cliente.php?accion=2">Registrar</br>Abono</a></div>
					
					<div class="opcion"><a href="cliente.php?accion=3">Consultar</br>Saldo</a></div>
					<div class="opcion"><a href="listasaldos.php">Lista de</br>Saldos</a></div>
					<div class="opcion"><a href="balance.php">Consultar</br>Balances</a></div>
					<div class="opcion"><a href="cerrarsesion.php">Cerrar</br>Sesion</a></div></br>
				</section>
			<footer>
			<aside > ©2013 Jose Carlos Rangel</aside>
			</footer>
				
		</div>
	</body>
</html>