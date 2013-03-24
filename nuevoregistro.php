<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	
	$con = conectar();
	
	$consulta = "select * from servicios";
	$resultado = mysql_query($consulta, $con);
	
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8">
		<title>Registar Nuevo Pago</title>
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
				<h2>Nuevo Registro de Pago</h2>
			</header>
			<section>
				<form method="post" action="registroguardado.php" >
					
					<div>
					<div class="conte"><div class="izq">Tipo de Servicio : </div><div class="der">
					<select name = "tipo"> 
						<?php
							if($resultado){
								while($datos = mysql_fetch_assoc($resultado))
								{
									echo	"<option value =\"".$datos['_id']."\">". $datos['Nombre']."</option>" ;
								}
							}
						?>
					</select></div></div>
					
					
					<div class="conte"><div class="izq">Fecha de Pago: </div><div class="der">
					<input type="date"  name="fecha" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required placeholder="ej. 2012-05-26"></input>
					</div></div>
					
					<div class="conte"><div class="izq">Mes:</div><div class="der"><select name = "mes" > 
						<option value ="Enero">Enero</option>
						<option value ="Febrero">Febrero</option>
						<option value ="Marzo">Marzo</option>
						<option value ="Abril">Abril</option>
						<option value ="Mayo">Mayo</option>
						<option value ="Junio">Junio</option>
						<option value ="Julio">Julio</option>
						<option value ="Agosto">Agosto</option>
						<option value ="Septiembre">Septiembre</option>
						<option value ="Octubre">Octubre</option>
						<option value ="Noviembre">Noviembre</option>
						<option value ="Diciembre">Diciembre</option>
					</select></div></div>
					
					<div class="conte"><div class="izq">Año: </div><div class="der"><input type="text" name="año" value="<?php  echo date('Y'); ?>"></input>
					</div></div>
					
					<div class="conte"><div class="izq">Monto: </div><div class="der"><input type="text" name="monto"></input>
					</div></div>
					
					<div class="conte"><div class="izq">Con Recibo:</div><div class="der"><select name = "recibo"> 
						<option value ="1">Si</option>
						<option value ="0">No</option>
						
					</select></div></div>
					
				<div class="conte"><div class="izq">	A Tiempo : </div><div class="der">
					<select name = "atiempo"> 
						<option value ="1">Si</option>
						<option value ="0">No</option>
						
					</select>
					</div></div>
					
					<input type="submit" value="Guardar Registro"></input>
					</div>
				</form>
			</section>
			<footer>
			<aside > ©2013 Jose Carlos Rangel</aside>
			</footer>
			</div>
			</body>
			</html>											