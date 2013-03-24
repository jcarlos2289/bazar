<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();?>
			<!DOCTYPE html>
		<html lang = "es">
			
			<head>
				<meta charset="utf-8">
				<title>Contraseña Cambiada</title>
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
						<h2>Cambiar Contraseña</h2>
					</header>
					<section>
						<h2>Cambio de contraseña</h2>
							</br>
	
	
	<?php 
	if(isset($_POST['passactual']) && isset($_POST['pass1'])&& isset($_POST['pass2']) ){
		$con = conectar();
		
		$consulta = "select pass from usuarios where _id = ".$iduser;
		$resultado = mysql_query($consulta, $con);
		$datos = mysql_fetch_assoc($resultado);
		$pass = $datos['pass'];
		
		if( ($pass == md5($_POST['passactual'])) && ($_POST['pass1'] == $_POST['pass2'])){
			$consulta2 = "UPDATE usuarios 	SET 		pass='"  . md5($_POST['pass1'] ). "' 	WHERE _id = ".$iduser ;
			$resultado2 = mysql_query($consulta2, $con);	
			
						if($resultado2 == TRUE){
							echo "Contraseña Cambiada Exitosamente";
							echo '<script>alert("Contraseña Cambiada Exitosamente")</script>';
							//sleep(10);
						    //header('Location: acciones.php');
						}
						}
						else {
							echo "No se pudo cambiar la contraseña";
							echo '<script>alert("No se pudo cambiar la contraseña")</script>';
							//header('Location: cambiapass.php');
							?>
							<a class="boton"  href="cambiarpass.php">Intentar de Nuevo</a>	
						<?php
							}
						
						
					?>
				<?php 
		
	}
	else { ?>
		<h3>Debe llenar todos los campos.</h3>
			<a class="boton"  href="cambiarpass.php">Intentar de Nuevo</a>	
		<?php	}
	
	?>
	<a class="boton"  href="acciones.php">Menu Principal</a>	
				</section>
								
				<footer>
					<aside  > ©2013 Jose Carlos Rangel</aside>
				</footer>
			</div>
		</body>
	</html>