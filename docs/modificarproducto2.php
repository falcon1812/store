<?php
session_start();
 	if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
	 	include "head.php"; 
		include "toolbaradmin.php";  	
		include "conexion.php";
		$respuesta=$_POST['respuesta'];
		$nombre = $_POST['nombre_producto'];
		$descripcion_producto = $_POST['descripcion_producto'];
		$precio = $_POST['precio'];
		$nombre_producto = $_POST['search_nombre'];
		$cantidad = $_POST['cantidad'];
		$categoria = $_POST['categoria'];
		if ($respuesta=="V") {
			$modificar="UPDATE producto SET nombre_producto='$nombre', descripcion_producto='$descripcion_producto', precio='$precio', cantidad='$cantidad', id_categoria='$categoria' WHERE nombre_producto='$nombre_producto'";
			$resultado=mysql_query($modificar);
			echo "<script>alert('El registro correspondiente al $nombre_producto fue modificado');
						  self.location='modificarproducto.php'</script>";
		} else {
			echo "<script>alert('El registro correspondiente al $nombre_producto no pudo ser modificado');</script>";
		}
			include "foot.php";
		} else {
	echo "<script> alert('Acceso denegado');
		  self.location='../index.php';
		  </script>";
}
?>
