<?php 	
session_start();
 if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
 }
	include "conexion.php";
	$usuario = $_POST['usuario'];
	$respuesta = $_POST['opcion'];
	if ($respuesta=='V') {
		$eliminar = "DELETE FROM usuarios WHERE nombre_usuario='$usuario'";
	    $resultado = mysql_query($eliminar);
	    echo "<script>alert('$usuario fue eliminado con exito');
	    			  self.location='panel.php';
	    	  </script>";
	} else {
		echo "<script>alert('$usuario no pudo ser eliminado');
					  self.location='delete.php';
			  </script>";
	}
?>
