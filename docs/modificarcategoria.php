<?php
session_start();
if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
?>
<form name="" method="POST">
	<center>
		<h2>Modificar categoria</h2>
		<table width="500" border="0">
			<tr>
				<td class="title">Nombre de categoria</td>
				<td class="title"><input type="text" name="nombre_categoria"  required></td>
			</tr>
			<tr>
				<td class="title"><input type="submit" value="buscar"></td>
			</tr>
		</table>
	</center>
</form>
<?php
if(isset($_POST['nombre_categoria'])) {
	include "conexion.php";
	$nombre = $_POST['nombre_categoria'];
	$consulta="SELECT * FROM categoria WHERE nombre LIKE '%$nombre%'";
	$resultado=mysql_query($consulta);
	$row=mysql_num_rows($resultado);
		if ($row==0) {
		echo "<script>alert('No existe');
					  self.location='modificarcategoria.php';
			  </script>";
	} else {
			$consulta="SELECT * FROM categoria WHERE nombre LIKE '%$nombre%'";
			$resconsulta=mysql_query($consulta);
			while ($row=mysql_fetch_array($resconsulta)){
?>
<center>
  <h1>Categoria a modificar</h1>
	<form name="" action="modificarcategoria2.php" method="POST">
		<table width="400" border="1">
			<tr>
				<td class="title">Nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"></td>
			</tr>
			<tr>
				<td class="title">ID</td>
				<td><input type="text" name="id_categoria" value="<?php echo $row['id_categoria']; ?>"></td>
			</tr>
		</table>
				<p>Esta seguro que desea modificar este registro</p>
					 <p>SI <input type="radio" value="V" name="respuesta" id="respuesta1"></p>
					 <p>NO <input type="radio" value="F" name="respuesta" id="respuesta2"></p>
				<p><input type="submit" value="Modificar"></p>
		<input type="hidden" value="<?php echo $row['nombre']; ?>" name="catego">
	</form>
</center>
<br>
<?php
				}
			}
		}
	} else {
	echo "<script> alert('Acceso denegado');
		self.location='../index.php';
		</script>";
	}	
	include "foot.php";
?>
