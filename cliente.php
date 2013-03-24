<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
		
	$con = conectar();
	
	$consulta = "SELECT * FROM clientes";
	$resultado = mysql_query($consulta, $con); 
	$accion = $_GET['accion'];
	?>
	<!DOCTYPE html>
	<html lang = "es">
		
		<head>
			<meta charset="utf-8">
			<title>Index</title>
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
					<h2>Inicio de Sesión</h2>
				</header>
				<section>
					<form method="post" >
						<div>
						<?php echo $accion;?>
							<select name = "cliente"> 
						<?php
							
							if($resultado){
								while($datos = mysql_fetch_assoc($resultado))
								{
									echo	"<option value =\"".$datos['_id']."\">". $datos['Nombre']." ".$datos['Apellido']."</option>" ;
								}
							}
						?>						
						</div>	
					</form>
				</section>
				<footer>
					<aside> ©2013 Jose Carlos Rangel</aside>
					</footer>
			</div>
		</body>
	</html>
	