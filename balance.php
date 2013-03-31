<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	
	
	$con = conectar();
	
	$consultaComp = "Select sum(monto) as Total from compras";
	$resultadoComp = mysql_query($consultaComp, $con);
	
	
	
	$consultaAb = "Select sum(monto) as Total from abonos";
	$resultadoAb = mysql_query($consultaAb, $con);
	
	
	if ($resultadoComp == TRUE && $resultadoAb == TRUE){
		$resCompra=mysql_fetch_assoc($resultadoComp);
		$resAbono=mysql_fetch_assoc($resultadoAb);
		$compra = $resCompra['Total'];
		$abono = $resAbono['Total'];
		$diferencia = $compra - $abono;
	?>
	<!DOCTYPE html>
	<html lang = "es">
		
		<head>
			<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
			<title>Balance de Cuentas</title>
			<!-- Compatibilidad con Elementos HTML5 -->
			<!--[if IE]>
				<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
				</script>
			<![endif]-->
			<link href="./css/estilos.css" rel="stylesheet" media="screen" />
		<link href="./css/imprimir.css" rel="stylesheet" media="print" /> 
		<link href="./css/movil.css" rel="stylesheet" media="handheld , only screen and (max-device-width: 480px)" />
		</head>
		
		<body>
			<div>
				<header>
					<h1>Bazar Evy - Sistema de Compras y Abonos </h1>	
					<h2>Balance de Cuentas</h2>
				</header>
				<section>
					<h2>Balance  General de Cuentas</h2>
					</br>
					<table border ="1">
						<tr><th>Ventas</th> <td> <?php echo number_format($compra ,2, '.', ' ') ;?></td></tr>
						<tr><th>Abonos</th> <td> <?php echo number_format($abono ,2, '.', ' ') ;?></td></tr>
						<tr><th>Diferencia</th> <td> <strong><?php echo number_format($diferencia ,2, '.', ' ') ;?></strong></td></tr>
						
					</table>
					</br>
					
					</br>
					
					<a class="boton" href="acciones.php">Menu Principal</a>
					
				</section>
				<footer>
					<aside > ©2013 Jose Carlos Rangel</aside>
				</footer>
				
			</div>
		</body>
	</html>
	
	<?php 
	}// fin de if de verificacion de resultado
	else {
		//echo $consulta;
		echo"Sin Datos que mostrar";
	}
	
	
?>