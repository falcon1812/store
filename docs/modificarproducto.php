<?php
session_start();
 if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado'){
 	include "head.php"; 
	include "toolbaradmin.php";  	
?>
<center>
	<form name="" method="POST">
		<h2>Modificar producto</h2>
		<table width="500" border="0">
			<tr>
				<td class="title">Nombre de producto</td>
				<td class="title"><input type="text" name="nombre_producto" id="nombre_producto" required></td>
			</tr>
			<tr>
				<td class="title"><input type="submit" value="buscar"></td>
			</tr>
		</table>
	</form>
</center>
<?php
	if(isset($_POST['nombre_producto'])) {
	include "conexion.php";
	$nombre_producto = $_POST['nombre_producto'];
	$consulta="SELECT * FROM producto WHERE nombre_producto LIKE '%$nombre_producto%'";
	$resultado=mysql_query($consulta);
	$row=mysql_num_rows($resultado);
		if ($row==0) {
		echo "<script>alert('No existe');
					  self.location='modificarproducto.php';
			  </script>";
	} else {
			$consulta="SELECT * FROM producto WHERE nombre_producto LIKE '%$nombre_producto%'";
			$resconsulta=mysql_query($consulta);
			while ($row=mysql_fetch_array($resconsulta)) 
			{
?>
		<center>
			<h1>Registro a Modificar</h1>
			<form name="" action="modificarproducto2.php" method="POST">
			<table width="400" border="1">
				<tr>
					<td class="title">Nombre del producto</td>
					<td><input type="text" name="nombre_producto" required value="<?php echo $row['nombre_producto']; ?>"></td>
				</tr>
				<tr>
					<td class="title">Descripcion del producto</td>
					<td><input type="text" name="descripcion_producto" id="producto" required value="<?php echo $row['descripcion_producto']; ?>"></td>
				</tr>
				<tr>
					<td class="title">Cantidad</td>
					<td><input type="text" name="cantidad"  required value="<?php echo $row['cantidad']?>"></td>
				</tr>
				<tr>
					<td class="title">Precio</td>
					<td><input type="text" name="precio" id="correo" required value="<?php echo $row['precio']; ?>"></td>
				</tr>
				<tr>
				<td class="title">Categoria</td>
					<td>
						<select name="categoria" class="catego" required>
							<?php 
								$consult = "SELECT * FROM categoria";
								$result = mysql_query($consult);
								while ($raw=mysql_fetch_array($result)) {
								$nombre_categoria= $raw['nombre'];	
								$id= $raw['id_categoria'];
							?>
							<option value="<?php echo $id; ?>"><?php echo $nombre_categoria; ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>
			<p>Esta seguro que desea modificar este registro</p>
			     <p>SI<input type="radio" value="V" name="respuesta" id="respuesta1"></p>
			     <p>NO<input type="radio" value="F" name="respuesta" id="respuesta2"></p>
			     <p><input type="submit" value="Modificar"></p>
			<input type="hidden" value="<?php echo $row['nombre_producto']; ?>" name="search_nombre" id="nombre_usuario">
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
