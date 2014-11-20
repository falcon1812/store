<?php
session_start();
if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
	include "head.php"; 
	include "toolbaradmin.php";  	
	include "conexion.php";
		$respuesta=$_POST['respuesta'];
		$name_catego = $_POST['catego'];
		$nombre = $_POST['nombre'];
		$id_categoria = $_POST['id_categoria'];
			if ($respuesta=="V") {
			$modificar="UPDATE categoria SET nombre='$nombre',id_categoria='$id_categoria' WHERE nombre='$name_catego'";
			$resultado=mysql_query($modificar);
			echo 	"<script> alert('$nombre fue modificada con exito');
					 self.location='modificarcategoria.php';
					 </script>";
			} else {
			echo 	"<script> alert('La categoria no pudo ser modificada');
					 self.location='modificarcategoria.php';
					 </script>";
			}
	include "foot.php";
	} else {
		echo "<script> alert('Acceso denegado');
			  self.location='modificarcategoria.php';
		      </script>";
	}
?>
