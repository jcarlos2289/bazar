<?php 
	include('php/funciones.php'); 
	if(isset($_POST['login'])&&isset($_POST['pass'])){
		$usuario = $_POST['login'];
		$pass = md5($_POST['pass']);
		
		$con= conectar();
		
		$consulta = "select _id,  pass from usuarios WHERE user='".$usuario."'";
		$resultado = mysql_query($consulta, $con);
		
		if($resultado == TRUE){
			$contra = mysql_fetch_assoc($resultado);
			if( $pass==$contra['pass']){
				$id_sesion =  uniqid();
				//llama a la pagina registrado y crea la sesion 
				//Abrir/reactivar la sesion
				session_start();
				//Guardar 2 informaciones en la sesion
				$_SESSION['usuario']=$usuario;
				$_SESSION['id']=$id_sesion;
				$_SESSION['iduser'] = $contra['_id'];
				//$_SESSION['TipoUser'] =$contra['idTipoUser']; 
				//es una matriz
				header('Location: acciones.php');
			}
			else{  
				header('Location: index.php?error=1') ;
			}
		}
		else{
			header('Location: index.php?error=2') ;
		}
		
	}
	else{
	?>
	<!DOCTYPE html>
	<html lang = "es">
		
		<head>
			<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
			<title>Index</title>
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
					<h1>Bazar Evy - Sistema de Compras y Abonos</h1>	
					<h2>Inicio de Sesión</h2>
				</header>
				<section>
					<form method="post" >
						<div>
							<div class="conte"><div class = "izq">Usuario:</div> <div class = "der"><input  type="text" name="login"></input></div></div>
							
							<div class="conte"><div class = "izq">Contraseña:</div> <div class = "der"><input  type="password" name="pass"></input></div></div>
							
							
							
							<input type="submit" value="Enviar"></input>
							
							
							<?php  if(isset($_GET['error'])){
								$er = $_GET['error'];
								if($er ==1){
									echo '</br><span style = "color:red;"> Combinación incorrecta</span> <br/>';
									echo '<script>alert("Combinación incorrecta")</script>';
								}
								else if($er == 2){
									echo '</br><span style = "color:red;"> Usuario No Existe</span> <br/>';
									echo '<script>alert("Usuario No Existe")</script>';
									echo $consulta;
								}
							}
							
							?>
						</div>	
					</form>
				</section>
				<footer>
					<aside> ©2013 Jose Carlos Rangel</aside>
					</footer>
			</div>
		</body>
	</html>
	
<?php } ?>			