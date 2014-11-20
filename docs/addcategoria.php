<?php 	
 session_start();
 if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
 } else {
 	echo "<script>alert('Acceso denegado');
 				  self.location='../index.php';</script>";
 }
 ?>
<form name="" action="" method="POST" enctype="multipart/form-data">
	<center>
		<h2>Añadir categoria</h2>
		<table>
			<tr>
				<td class="title">Nombre de categoria</td>
				<td class="title"><input type="text" name="nombre_categoria" required></td>
			</tr>
			<tr>
				<td class="title"><input type="submit" name="registrar"></td>
			</tr>
		</table>
	</center>
</form>
<?php
	include "conexion.php";
	if (isset($_POST['nombre_categoria'])) {
		error_reporting(0);
		$nombre =$_POST['nombre_categoria'];
		$consulta="SELECT * FROM categoria WHERE nombre=".$nombre;
		$resultado = mysql_query($consulta);
		$row = mysql_fetch_array($resultado);
			if ($row['1']==0) 	{
					$nombre = $_POST['nombre_categoria'];
					$insertar = "INSERT INTO categoria VALUES('$nombre',NULL)";
					$resultadoinsert = mysql_query($insertar);
					echo "<script>alert('Categoria guardada');
					self.location='addcategoria.php';</script>";
							} else {
					echo "<script>alert('Ya existe');
					self.location='addcategoria.php';</script>";
							}
					}
	include "foot.php";
?>
