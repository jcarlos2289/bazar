<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	$idcliente = da_cliente();
	$datoscliente = busca_cliente($idcliente);
	
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8">
		<title>Registro de Abono</title>
		<link href="./css/estilos.css" rel="stylesheet" media="screen" />
		<link href="./css/imprimir.css" rel="stylesheet" media="print" />
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
				<h2>Registrar Nuevo Abono</h2>
			</header>
			<section>
				<h2>Registro de Abono</h2>
				<h2>Cliente: <?php echo $datoscliente['Nombre']." ".$datoscliente['Apellido'] ;?></h2>
				</br>
				<form method="post" action="abonoagregado.php">
					<div>
				<div class="conte"><div class="izq">Saldo Actual: </div><div class="der"> 
					<?php echo "B/. ".$datoscliente['Saldo'] ;?>
				</div></div>
				
						<div class="conte"><div class="izq">Fecha: </div><div class="der">
							<input type="date"  name="fecha" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required placeholder="ej. 2012-05-26"></input>
						</div></div>
						
						<div class="conte"><div class="izq">Abono: </div><div class="der"><input type="text" name="monto"></input>
						</div></div>
						
						
						
						
						<input type="submit" value="Guardar Abono"></input>
					</div>
				</form>	
				
				<a class="boton"  href="acciones.php">Menu Principal</a>	
			</section>
			<footer>
				<aside  > ©2013 Jose Carlos Rangel</aside>
			</footer>
		</div>
	</body>
</html>