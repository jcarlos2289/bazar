<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	if(isset($_POST['nombre']) && isset($_POST['apellido'])){
	
   
	$con = conectar();
	
	$consulta = "INSERT INTO clientes 	(Nombre, Apellido, Saldo) VALUES 
	('".$_POST['nombre']."', '".$_POST['apellido']."', 0)";
	
	$resultado = mysql_query($consulta, $con);
	
	if ($resultado == TRUE){
		
	
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>Nuevo Cliente Agregado</title>
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
				<h2>Nuevo Cliente Agregado</h2>
			</header>
			<section>
					<h2>Datos del nuevo cliente</h2>
					</br>
					<table border ="1">
					<tr><th>Nombre</th> <td> <?php echo $_POST['nombre'];?></td></tr>
					<tr><th>Apellido</th> <td> <?php echo $_POST['apellido'];?></td></tr>
					
					</table>
					</br>
					
					</br>
					<a class="boton" href="cliente.php">Continuar</a>
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
		 echo $consulta;
		 echo"No se pudo ingresar el Cliente";
		 }
		
	}//fin de if de verificacion de isset
	else{
		echo"Debe llenar todos los campos";
	}
	
?>	