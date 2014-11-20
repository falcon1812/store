<?php 
session_start();
	if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
	include "head.php"; 
	include "toolbaradmin.php";
	} else {
	echo "<script>alert('Acceso denegado');
	              self.location='../index.php';
		  </script>";
	}
	include "conexion.php";
	$consulta="SELECT * FROM categoria";
	$registro=mysql_query($consulta); 
?>
<center>
	<h2>Consulta general</h2>
		<table id="table">
			<thead>
				<tr>
					<th><h2 class="title">Nombre</h2></th>
					<th><h2 class="title">ID</h2></th>
				 </tr>
			</thead>
			<tbody>
				<?php while ($row=mysql_fetch_array($registro)) { ?>
				<tr>
					<td class="title"><?php echo $row['nombre']; ?></td>
					<td class="title"><?php echo $row['id_categoria']; ?></td>
				</tr>
				<?php }  ?>
			</tbody>
		</table>
</center>
<script>
	$(document).ready(function() {
		$('#table').dataTable();
	} );
</script>
<?php include "foot.php"; ?>
