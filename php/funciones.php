<?php
	function conectar(){
		$id1 = mysql_connect('beta-app.mysql.eu1.frbit.com','beta-app', 'TL_1Rbuy1DE9lyst');
		$ok = mysql_select_db('beta-app',$id1);
		return($id1);
		
	}
	
	function existe_sesion(){
		session_start();
		if(isset($_SESSION['usuario'])&&isset($_SESSION['id'])){
			$iduser=$_SESSION['iduser'];
			return $iduser;
		}
		else{
			header('Location: index.php') ;
			
		} 
		
		
	}
	
	function busca_servicio($id){
		$con = conectar();
		$consulta4 = "Select Nombre From servicios where _id =".$id;
		$resultado4 = mysql_query($consulta4, $con);
		$datos4 = mysql_fetch_assoc($resultado4);
		$servicio = $datos4['Nombre'];
		return $servicio;
		
	}
	
?>