<?php 
session_start();
	if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
	include "head.php"; 
	include "toolbaradmin.php";
	} else {
	echo "<script>alert('Acceso denegado');self.location='../index.php';</script>";
	}
	include "conexion.php";
	$consulta="SELECT * FROM producto";
	$registro=mysql_query($consulta); 
?>
<center>
	<h2>Consulta general</h2>
		<table id="table">		
			<thead>
				<tr>
					<th><h3 class="title">Nombre</h3></th>
					<th><h3 class="title">Descripcion</h3></th>
					<th><h3 class="title">Cantidad</h3></th>
					<th><h3 class="title">Precio</h3></th>
					<th><h3 class="title">Foto</h3></th>
				 </tr>
			</thead>
			<tbody>
			<?php while ($row=mysql_fetch_array($registro)) { ?>
				<tr>
					<td class="title" id="title"><?php echo $row['nombre_producto']; ?></td>
					<td class="title" id="title"><?php echo $row['descripcion_producto']; ?></td>
					<td class="title" id="title"><?php echo $row['cantidad']; ?></td>
					<td class="title" id="title"><?php echo $row['precio']; ?></td>
					<td class="mini" id="title"><a href="<?php echo $row['foto']; ?>" rel="shadowbox"><img src="<?php echo $row['foto']; ?>" class="mini" rel="shadowbox"></a></td>
				</tr>
				<?php }  ?>
			</tbody>
		</table>
</center>
<script>
	$(document).ready(function() {
		$('#table').dataTable();
		Shadowbox.init();
	} );
</script>
<?php include "foot.php"; ?>
