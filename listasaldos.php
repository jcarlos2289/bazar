<?php 
	include('php/funciones.php'); 
	
	$iduser = existe_sesion();
	
	
	$con = conectar();
	
	$consulta3 = "SELECT * FROM `clientes` WHERE saldo >0";
	$resultado3 = mysql_query($consulta3, $con);
	$monto_total = 0;
	
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<!-- name="viewport" content="width=device-width, initial-scale=1"-->
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>Clientes con Saldo </title>
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
				<h2>Lista de Clientes con Saldo</h2>
			</header>
			<section>
				<h2>Clientes con Saldo al <?php echo date('j/M/Y') ;?></h2>
				
				</br>
				
				<section>
					<?php
						
						//mes,fechaPago,conRecibo,monto
						if($resultado3 == true){
						?>
						<table border = "1">
						    <tr><th>Nombre </th><th>Saldo</th></tr>
							<?php
								
								while($datos3 = mysql_fetch_assoc($resultado3))
								{
									echo	"<tr><td><a href=filtrosaldo.php?xh25=\"".$datos3['_id']."\" title=\"Ver Historial\">".$datos3['Nombre']." ".$datos3['Apellido']."</a></td><td>".number_format($datos3['Saldo'],2, '.', ' ')."</td></tr>";
									$monto_total += $datos3['Saldo'];
								}
							?>
							<tr><th><strong>Total Credito</strong></th><th><strong><?php echo  number_format($monto_total,2, '.', ' '); ?></strong></th></tr>
						</table>
						<?php
						}
						else 
						{echo "<h3> Sin Datos para mostar</h3>";}
					?>
					
					
				</section>
				
				
				<a class="boton"  href="acciones.php">Menu Principal</a>	
			</section>
			<footer>
				<aside  > ©2013 Jose Carlos Rangel</aside>
			</footer>
		</div>
	</body>
</html>