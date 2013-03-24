<?php
	include('php/funciones.php'); 
	$iduser = existe_sesion();
	session_start();
	$accion = da_accion();
	establece_cliente( $_POST['cliente']);
	
	//echo"ola ke ase";
	//echo da_accion();
	//echo da_cliente();
	
	switch ($accion) {
    case 1:
       //echo"2".da_cliente(); 
	   header('Location: compra.php') ;
        break;
    case 2:
	//echo "4".da_cliente();
      header('Location: abono.php') ;
        break;
    case 3:
	//echo "6".da_cliente();
     header('Location: saldo.php') ;
        break;
		 default:
       header('Location: acciones.php') ;
}
	
	
	
	?>