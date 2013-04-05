<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	session_start();
	if(isset($_GET['accion'])){
	establece_accion($_GET['accion']);
		}
	$con = conectar();
	
	$consulta = "SELECT * FROM clientes order By Nombre Asc";
	$resultado = mysql_query($consulta, $con); 
	
	?>
	<!DOCTYPE html>
	<html lang = "es">
		
		<head>
			<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
			<title>Seleccione el Cliente</title>
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
					<h2>Seleccione el Cliente</h2>
				</header>
				<section>
					<form method="post" action="filtro.php?accion=<?php  echo $_GET['accion']?>">
						<div>
						<?php //echo $_SESSION['accion'];?>
							Cliente: 	</br><select name = "cliente"> 
						<?php
							
							if($resultado){
								while($datos = mysql_fetch_assoc($resultado))
								{
									echo	"<option value =\"".$datos['_id']."\">". $datos['Nombre']." ".$datos['Apellido']."</option>" ;
								}
							}
						?>	
						</select>
						</br>
						</br>
						<input type="submit" value="Seleccionar" ></input>
						</br>
							</br>
						<input type="submit" value="Nuevo Cliente" onclick = "this.form.action = 'nuevo.php'"></input>
							</br>
						</div>	
					</form>
				</section>
				<footer>
					<aside> ©2013 Jose Carlos Rangel</aside>
					</footer>
			</div>
		</body>
	</html>
	