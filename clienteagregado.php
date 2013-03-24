<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	if(isset($_POST['nombre']) && isset($_POST['apellido'])){
	
   
	$con = conectar();
	
	$consulta = "INSERT INTO clientes 	(Nombre, Apellido, Saldo, FechaInicial) VALUES 
	('".$_POST['nombre']."', '".$_POST['apellido']."', 0, '". date('Y-m-d')."')";
	
	$resultado = mysql_query($consulta, $con);
	
	if ($resultado == TRUE){
		
	
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8">
		<title>Registar Nuevo usuario</title>
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
				<h1>Sistema de Gestión de Pagos a Servicos Publicos </h1>	
				<h2>Nuevo Cliente Agregado</h2>
			</header>
			<section>
					<h2>Datos del nuevo usuario</h2>
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
		 echo"No se pudo ingresar el Usuario";
		 }
		
	}//fin de if de verificacion de isset
	else{
		echo"Debe llenar todos los campos";
	}
	
?>	