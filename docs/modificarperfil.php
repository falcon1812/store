<?php
session_start();
if ($_SESSION['tipo']=='estandar' && $_SESSION['estado']=='auntenticado') {
	include "head.php"; 
	include "toolbar2.php";  	
	include "conexion.php";
		$respuesta=$_POST['respuesta'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$nombre_usuario = $_POST['nombre_usuario'];
		$password = $_POST['password'];
		$correo = $_POST['correo'];
	if ($respuesta=="V") {
		$modificar="UPDATE usuarios SET nombre='$nombre', apellido='$apellido', nombre_usuario='$nombre_usuario', password='$password', correo='$correo' WHERE nombre_usuario='$nombre_usuario'";
		$resultado=mysql_query($modificar);
			echo "<script>alert('el registro fue modificado');self.location='perfil.php';</script>";
		}else{
			echo "<script>alert('el registro no fue modificado');self.location='perfil.php';</script>";
		}
			include "foot.php";
	} else {
	echo "<script> alert('Acceso denegado');
		  self.location='../index.php';
		  </script>";
}
?>
