<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	if(isset($_POST['fecha']) && isset($_POST['monto'])){
	$idcliente = da_cliente();
	$datoscliente = busca_cliente($idcliente);
    $saldo_actual = $datoscliente['Saldo'];
	$monto = $_POST['monto'];
	$saldo_nuevo = $saldo_actual + $monto;
	
	$con = conectar();
	
	$consulta = "INSERT INTO  `compras` (`_id` , `idCliente` , `monto` , `fecha`) VALUES 
		(NULL ,  '".$idcliente."',  '".$monto."',  '".$_POST['fecha']."')";
		$resultado = mysql_query($consulta, $con);
	
	if ($resultado == TRUE){
		$consulta2 = "UPDATE  clientes SET  `Saldo` =  '".$saldo_nuevo."' WHERE  `clientes`.`_id` =".$idcliente;
		$resultado2 = mysql_query($consulta2, $con);
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8">
		<title>Compra Registrada</title>
		<!-- Compatibilidad con Elementos HTML5 -->
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
			</script>
		<![endif]-->
		<link href="./css/estilos.css" rel="stylesheet" />
	</head>
	
	<body>
		<div>
			<header>
				<h1>Bazar Evy - Sistema de Compras y Abonos </h1>	
				<h2>Nuevo Compra Registrada</h2>
			</header>
			<section>
					<h2>Registro de Compra</h2>
				    <h2>Cliente: <?php echo $datoscliente['Nombre']." ".$datoscliente['Apellido'] ;?></h2>
					
					
					<h2>Detalles de Compra</h2>
					
					</br>
					<?php if($resultado2 == TRUE){ ?>
					<table border ="1">
					<tr><th>Saldo Anterior</th> <td> <?php echo number_format($datoscliente['Saldo'] ,2, '.', ' ');?></td></tr>
					<tr><th>Nueva Compra</th> <td> <?php echo number_format($monto; ,2, '.', ' ')?></td></tr>
					<tr><th>Nuevo Saldo</th> <td> <strong><?php echo number_format($saldo_nuevo ,2, '.', ' ')	;?></strong></td></tr>
				
					</table>
					<?php 
							}else{
							echo"Nuevo Saldo no Actualizado"; }?>
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
		// echo $consulta;
		 echo"No se pudo Registrar Compra";
		 }
		
	}//fin de if de verificacion de isset
	else{
		echo"Debe llenar todos los campos";
	}
	
?>	