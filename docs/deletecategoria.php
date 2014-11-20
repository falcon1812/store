<?php 	
session_start();
 if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
 } 
 ?>
 <form action="" method="POST">
	<center>
		<h2>Eliminar categoria</h2>
		<table>
			<tr>
				<td class="title">Buscar nombre de categoria</td>
				<td class="title"><input type="search" name="nombre_categoria" required></td>
			</tr>
			<tr>
				<td class="title"><input type="submit" name="buscar"></td>
			</tr>
		</table>
	</center>
 </form>
<?php
	include "conexion.php";
	if (isset($_POST['nombre_categoria'])) {
		$categoria = $_POST['nombre_categoria'];
		$consulta="SELECT * FROM categoria WHERE nombre LIKE '%$categoria%'";
		$resultado =mysql_query($consulta);
		$row=mysql_num_rows($resultado);
		if ($row==0) {
			echo "<script>alert('No existe');
				          self.location='deletecategoria.php';
				  </script>";
		} else {
			$fila=mysql_fetch_array($resultado);
?>
<table>
	<tr>
		<td class="title"><?php echo $fila['nombre']; ?></td>
	</tr>
</table>
<form action="deletecategoria2.php" method="POST">
	<table>
		<tr>
			<td class="title">Está seguro que desea eleminar este registro?</td>
		</tr>
		<tr>
			<td class="title">Si <input type="radio" name="opcion" id="opcion1" value="V" required></td>
			<td class="title">No <input type="radio" name="opcion" id="opcion2" value="F" required></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
				<input type="submit" name="submit" value="Continuar">
			</td>
		</tr>
	</table>
</form>
<?php		
		}
	}
	include "foot.php";
?>		
