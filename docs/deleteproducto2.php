<?php 	
session_start();
 if ($_SESSION['tipo']=='administrador') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
 }
	include "conexion.php";
	$producto = $_POST['producto'];
	$respuesta = $_POST['opcion'];
	if ($respuesta=='V') {
		$eliminar = "DELETE FROM producto WHERE nombre_producto='$producto'";
	    $resultado = mysql_query($eliminar);
	    echo "<script>alert('$producto fue eliminado con exito');
	    			  self.location='panel.php';
	    	  </script>";
	} else {
		echo "<script>alert('$producto no pudo eliminarse');
					  self.location='deleteproducto.php';
			  </script>";
	}
?>
