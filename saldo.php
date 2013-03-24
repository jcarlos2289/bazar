<?php 
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	
	$con = conectar();
	
	$consulta = "select * from servicios";
	$resultado = mysql_query($consulta, $con); 
	
	$consulta2 = "select `año` from `registro` group by `año` order by año desc";
	$resultado2 = mysql_query($consulta2, $con);
	
?>
<!DOCTYPE html>
<html lang = "es">
	
	<head>
		<meta charset="utf-8">
		<title>Historico de Facturación por Servicio</title>
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
				<h2>Historial de Pagos por Servicios</h2>
			</header>
			<section>
				</br>
				<form method="post" >
					Servicio:<select name = "serv"> 
						<?php
							
							if($resultado){
								while($datos = mysql_fetch_assoc($resultado))
								{
									echo	"<option value =\"".$datos['_id']."\">". $datos['Nombre']."</option>" ;
								}
							}
						?>
						
					</select>
					
					
					</br>
					Año: <select name = "año"> 
						<?php
							
							if($resultado2){
								while($datos2 = mysql_fetch_assoc($resultado2))
								{
									echo	"<option value =\"".$datos2['año']."\">". $datos2['año']."</option>" ;
								}
							}
						?>
						
					</select>
					</br>
					<input type="submit" value="Ver"></input>
					
				</form>
			</section>
			
			<?php 	
				if(isset($_POST['serv']) && isset($_POST['año'])){
					$consulta3 = "select mes, fechaPago, conRecibo, monto, pagoAtiempo from `registro` where idServicio = " .$_POST['serv']. " and `año` = ".$_POST['año'];
					$resultado3 = mysql_query($consulta3, $con);
					$monto_total = 0;
					
					$servicio = busca_servicio($_POST['serv']);
					
				?>
				
				<section>
					<h2>Historial para el Servicio de  <?php echo $servicio;?></h2>
					<h2>Año <?php echo $_POST['año'];?></h2>
						</br>
						<?php
							//mes,fechaPago,conRecibo,monto
							if($resultado3 == true){
							?>
							<table border = "1">
						    <tr><th>Mes</th><th>Fecha de Pago</th><th>Con Recibo</th><th>A Tiempo</th><th>Monto</th></tr>
							<?php
							
								while($datos3 = mysql_fetch_assoc($resultado3))
								{
									$recibo = ($datos3['conRecibo']=="1") ? "Si" : "No";
		                            $atiempo = ($datos3['pagoAtiempo']=="1") ? "Si" : "No";
									$clase = ($datos3['pagoAtiempo']=="1") ? " " : "  class=\"tarde\" ";
									$fecha = date_create($datos3['fechaPago']);
									echo	"<tr".$clase."><td>".$datos3['mes']."</td><td>".date_format($fecha, 'd-M-Y')."</td><td>".$recibo."</td><td>".$atiempo."</td><td>".number_format($datos3['monto'],2, '.', ' ')."</td></tr>";
									$monto_total += $datos3['monto'];
								}
								?>
									<tr><td colspan="4"><strong>Total</strong></td><td><strong><?php echo  number_format($monto_total,2, '.', ' '); ?></strong></td></tr>
								</table>
								<?php
							}
							else 
							{echo "<h3> Sin Datos para mostar</h3>";}
						?>
						<a class="boton"  href="acciones.php">Menu Principal </a>
					</section>
				<?php
				}
				?>
			
			<footer>
			<aside  > ©2013 Jose Carlos Rangel</aside>
			</footer>
		</div>
	</body>
</html>