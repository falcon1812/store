<?php 	
session_start();
 if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
 } 
 ?>
<form action="" method="POST">
	<center>
		<h2>Eliminar producto</h2>
		<table>
			<tr>
				<td class="title">Buscar nombre de producto</td>
				<td class="title"><input type="search" name="nombre_producto" required></td>
			</tr>
			<tr>
				<td class="title"><input type="submit" name="buscar"></td>
			</tr>
		</table>
	</center>
 </form>
<?php
	include "conexion.php";
	if (isset($_POST['nombre_producto'])) {
		$producto = $_POST['nombre_producto'];
		$consulta="SELECT * FROM producto WHERE nombre_producto LIKE '%$producto%'";
		$resultado =mysql_query($consulta);
		$row=mysql_num_rows($resultado);
		if ($row==0){
		echo "<script>alert('El producto no existe');
				          self.location='deleteproducto2.php';
			  </script>";
		}else{
		$fila=mysql_fetch_array($resultado);
?>
<table>
	<tr>
		<td class="title"><?php echo $fila['nombre_producto']; ?></td>
		<td class="title"><?php echo $fila['descripcion_producto']; ?></td>
		<td class="title"><?php echo $fila['cantidad']; ?></td>
		<td class="title"><?php echo $fila['precio']; ?></td>
	</tr>
</table>
<form action="deleteproducto2.php" method="POST">
	<table>
		<tr>
			<td class="title">Está seguro que desea eleminar este registro?</td>
		</tr>
		<tr>
			<td class="title">
				Si 
				<input type="radio" name="opcion" id="opcion1" value="V">
				No 
				<input type="radio" name="opcion" id="opcion2" value="F">
			</td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="producto" value="<?php echo $fila['nombre_producto']; ?>">
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
