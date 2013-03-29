<?php 
	include('php/funciones.php'); 
	
	$iduser = existe_sesion();
	$idcliente = da_cliente();
	$datoscliente = busca_cliente($idcliente);
	
	$con = conectar();
	
	$consulta3 = "SELECT * FROM `abonos` WHERE idCliente =".$idcliente ;
	$resultado3 = mysql_query($consulta3, $con);
	$monto_total = 0;
	
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8">
		<title>Consultar Saldo</title>
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
				<h1>Bazar Evy - Sistema de Compras y Abonos </h1>	
				<h2>Saldo e Historial de Abonos</h2>
			</header>
			<section>
				<h2>Historial de Abonos </h2>
				<h2>Cliente: <?php echo $datoscliente['Nombre']." ".$datoscliente['Apellido'] ;?></h2>
				</br>
				<section>
					<div>
						<table border = "1">
						<tr><th>Saldo Actual</th><td><?php echo "B/. ".number_format($datoscliente['Saldo'] ,2, '.', ' ') ;?></td></tr>
						</table>
					</div>
					</section>
				<section>
					<?php
						
						//mes,fechaPago,conRecibo,monto
						if($resultado3 == true){
						?>
						<table border = "1">
						    <tr><th>Fecha </th><th>Monto</th></tr>
							<?php
								
								while($datos3 = mysql_fetch_assoc($resultado3))
								{
									$fecha = date_create($datos3['fecha']);
									echo	"<tr><td>".date_format($fecha, 'd-M-Y')."</td><td>".number_format($datos3['monto'],2, '.', ' ')."</td></tr>";
									$monto_total += $datos3['monto'];
								}
							?>
							<tr><td><strong>Total Abonado</strong></td><td><strong><?php echo  number_format($monto_total,2, '.', ' '); ?></strong></td></tr>
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