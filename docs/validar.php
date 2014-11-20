<?php
	$usuario = $_POST['nombre_usuario'];
	$password = $_POST['password'];
	include "conexion.php";
	$consulta="SELECT * FROM usuarios WHERE nombre_usuario='$usuario' AND password='$password'";
	$resultado = mysql_query($consulta,$link);
	$row = mysql_num_rows($resultado);
	if ($row==0) {
		echo "<script>alert('Este usuario no existe');
			          self.location='login.php';
			  </script>";
	} else {
		$fila = mysql_fetch_array($resultado);
			if ($fila['id_tipo']==1) {
				session_start();
				$_SESSION['usuario']= $usuario;
				$_SESSION['tipo']= 'administrador';
				$_SESSION['estado']= 'auntenticado';
				echo "<script>alert('Bienvenido al panel $usuario');
					          self.location='panel.php';</script>"; 
			} else {
				session_start();
				$_SESSION['usuario']= $usuario;
				$_SESSION['tipo']= 'estandar';
				$_SESSION['estado']= 'auntenticado';
				echo "<script>alert('Bienvenido $usuario');
				              self.location='../index.php';</script>";
		}
	}
?>
