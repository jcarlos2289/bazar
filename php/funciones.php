<?php
	function conectar(){
		$id1 = mysql_connect('mysql.xunem.com','u835488897_cuent', '1855318553');
		$ok = mysql_select_db('u835488897_cuentas',$id1);
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
	
	function busca_cliente($id){
		$con = conectar();
		$consulta4 = "Select * From clientes where _id =".$id;
		$resultado4 = mysql_query($consulta4, $con);
		$datos4 = mysql_fetch_assoc($resultado4);
		$servicio = $datos4['Nombre'];
		return $datos4;
	}
	
	
	function establece_accion($acc){
	session_start();
	$_SESSION['accion'] = $acc;
	}
	
	function establece_cliente($acc){
	session_start();
	$_SESSION['cliente'] = $acc;
	}
	
	function da_accion(){
	session_start();
		$acc=$_SESSION['accion'];
			return $acc;
	}
	
	
	function da_cliente(){
	session_start();
		$acc=$_SESSION['cliente'];
			return $acc;
	}
?>