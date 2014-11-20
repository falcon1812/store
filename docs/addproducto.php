<?php 	
 session_start();
 if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado'){
 	include "head.php"; 
	include "toolbaradmin.php";  	
 } else {
 	echo "<script>
 				alert('Acceso denegado');
 				self.location='../index.php';
 		  </script>";
 }
 ?>
<form name="" method="POST" enctype="multipart/form-data">
	<center>
		<h2>Añadir producto</h2>
		<table>
			<tr>
				<td class="title">Nombre producto</td>
				<td class="title"><input type="text" name="nombre_producto" required></td>
			</tr>
			<tr>
				<td class="title">Descripcion del producto</td>
				<td class="title"><textarea type="text" name="descripcion_producto" class="area" required></textarea></td>
			</tr>
			<tr> 
				<td class="title">Cantidad</td>
				<td class="title">
					<input type="number" name="cantidad" required>
				</td>
			</tr>
			<tr>
				<td class="title">Precio</td>
				<td class="title">
					<input type="decimal" name="precio" required>
				</td>
			</tr>
			<tr>
				<td class="title">Categoria</td>
				<td class="title">
				<select name="categoria" required>
					<?php 
						include "conexion.php";
						$consult = "SELECT * FROM categoria";
						$result = mysql_query($consult);
						while ($row=mysql_fetch_array($result)) {
						$nombre_categoria= $row['nombre'];	
						$id= $row['id_categoria'];
					?>
					<option value="<?php echo $id; ?>"><?php echo $nombre_categoria; ?></option>
					<?php } ?>
				</select>
				</td>
			</tr>
			<tr>
				<td class="title">Foto</td>
				<td class="title"><input type="file" name="foto" required></td>
			</tr>
			<tr>
				<td><input type="submit"></td>
			</tr>
		</table>
	</center>
</form>
<?php
	if(isset($_POST['nombre_producto']) 
		&& isset($_POST['descripcion_producto']) 
		&& isset($_POST['cantidad']) 
		&& isset($_POST['precio'])) 
	{
		include "conexion.php";
		$nombre_producto = $_POST['nombre_producto'];
		$descripcion_producto = $_POST['descripcion_producto'];
		$cantidad = $_POST['cantidad'];
		$categoria = $_POST['categoria'];
		$precio = $_POST['precio'];
			if ($_FILES['foto']['name']) {
				$img = $_FILES['foto']['tmp_name'];
				$archivo= $_FILES['foto']['name'];
				$tipo=getimagesize($img);
				if($tipo[2]==2) {
					$ext=".jpg";
					$tipoimagen=0;
				} else {
					$tipoimagen=1;
				}
				if ($tipoimagen==1) {
					echo "	<script>alert('La imagen no es valida');
									self.location='addproducto.php';
			  		  		</script>";
				}
				$rutica = "../producto/".$archivo;
				$up_img=copy($img,$rutica);
				if(!$up_img) {
					echo "<script>alert('No se pudo cargar el producto');
		               			  self.location='addproducto.php';
			  			  </script>";
				} else {
					$consulta="SELECT * FROM producto WHERE nombre_producto='$nombre_producto'";
					$resultado=mysql_query($consulta);
					$row=mysql_num_rows($resultado);
					if($row==0) {
						$insertar="INSERT INTO producto VALUES (NULL,'$nombre_producto','$descripcion_producto','$cantidad','$precio','$rutica','$categoria')";
						$resultado=mysql_query($insertar);
						echo "<script>alert('$nombre_producto fue cargado con exito');
					               self.location='addproducto.php';
						  	  </script>";
					} else {
						echo "<script>alert('Error al añadir producto');
				               self.location='addproducto.php';
					  	      </script>";
					}
				}
			}
		}
	include "foot.php";
?>
