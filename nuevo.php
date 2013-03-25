<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
		
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8">
		<title>Registar Nuevo Cliente</title>
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
				<h2>Registro de Nuevo Cliente</h2>
			</header>
			<section>
				<form method="post" action="clienteagregado.php"  >
					
					<div>
						
						<div class="conte"><div class="izq">Nombre: </div><div class="der"><input type="text" name="nombre"></input> </div></div>
						<div class="conte"><div class="izq">Apellido: </div><div class="der"><input type="text" name="apellido"></input></div></div>
						
							</select>
							</br>
							<input type="submit" value="Guardar Cliente"></input>
							</div>
							
					</div>
				</form>
			</section>
			<footer>
			<aside  > ©2013 Jose Carlos Rangel</aside>
			</footer>
			
		</div>
	</body>
</html>