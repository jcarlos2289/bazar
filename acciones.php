<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	
	?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8">
		<title>Acciones</title>
		<link href="./css/estilos.css" rel="stylesheet" />
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
				<h1>Sistema de Gestión de Pagos a Servicos Publicos </h1>	
				<h2>Acciones permitidas</h2>
			</header>
			<section >
				<div class="opcion"><a href="cliente.php?accion=1">Registrar</br>Compra</a></div>
				<div class="opcion"><a href="cliente.php?accion=2">Registrar</br>Abono</a></div>
					<?php
					if ( $_SESSION['TipoUser'] == 1)
					echo "<div class=\"opcion\"><a href=\"registraruser.php\">Ingresar nuevo Usuario</a></div>";
					?>
					<div class="opcion"><a href="cliente.php?accion=3">Consultar</br>Saldo</a></div>
					<div class="opcion"><a href="cerrarsesion.php">Cerrar</br>Sesion</a></div></br>
				</section>
			<footer>
			<aside > ©2013 Jose Carlos Rangel</aside>
			</footer>
				
		</div>
	</body>
</html>