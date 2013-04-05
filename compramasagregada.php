<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	if(isset($_POST['monto'])){
	$idcliente = da_cliente();
	$datoscliente = busca_cliente($idcliente);
    $saldo_actual = $datoscliente['Saldo'];
	$monto = $_POST['monto'];
	$saldo_nuevo = $saldo_actual + $monto;
	$compra_nueva = 0;
	$con = conectar();
	$idcompra = $_GET['id'];
	
	
	$consulta3 = "SELECT * FROM `compras` WHERE _id =".$idcompra ;
	$resultado3 = mysql_query($consulta3, $con);
	$datos3 = mysql_fetch_assoc($resultado3);	
	$compra_nueva = $datos3['monto'] + $monto;
	
	$consulta = "UPDATE  compras SET  `Monto` =  '".$compra_nueva."' WHERE  `compras`.`_id` =".$idcompra;
		$resultado = mysql_query($consulta, $con);
		
		$consulta2 = "UPDATE  clientes SET  `Saldo` =  '".$saldo_nuevo."' WHERE  `clientes`.`_id` =".$idcliente;
		$resultado2 = mysql_query($consulta2, $con);
			
	if (($resultado == TRUE) && ($resultado2 ==  TRUE)){
		
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<title> Edición de Compra - Adición</title>
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
				<h2>Editar Compras</h2>
			</header>
			<section>
					<h2>Adicionar a Compra</h2>
				    <h2>Cliente: <?php echo $datoscliente['Nombre']." ".$datoscliente['Apellido'] ;?></h2>
					
					
					<h2>Detalles de Compra</h2>
					
					</br>
					<?php if($resultado2 == TRUE){ ?>
					<table border ="1">
					<tr><th>Saldo Anterior</th> <td> <?php echo number_format($datoscliente['Saldo'] ,2, '.', ' ');?></td></tr>
					<tr><th>Valor Añadido</th> <td> <?php echo number_format($monto ,2, '.', ' ');?></td></tr>
					<tr><th>Nuevo Saldo</th> <td> <strong><?php echo number_format($saldo_nuevo ,2, '.', ' ')	;?></strong></td></tr>
				
					</table>
					<?php 
							}else{
							echo"Compra no Actualizada"; }?>
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
		 echo"No se pudo Editar Compra";
		 }
		
	}//fin de if de verificacion de isset
	else{
		echo"Debe llenar todos los campos";
	}
	
?>	