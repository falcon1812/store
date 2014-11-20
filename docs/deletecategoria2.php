<?php 	
session_start();
error_reporting(0);
 if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
 	}
	include "conexion.php";
	$categoria = $_POST['categoria'];
	$respuesta = $_POST['opcion'];
	if ($respuesta=='V') {
		$eliminar = "DELETE FROM categoria WHERE nombre='$categoria'";
	    $resultado = mysql_query($eliminar);
	    echo "<script>alert('$categoria fue eliminada con exito');
	    			  self.location='panel.php';
	    	  </script>";
	} else {
		echo "<script>alert('La categoria no fue eliminada');
					  self.location='deletecategoria.php';
			  </script>";
	}
?>
