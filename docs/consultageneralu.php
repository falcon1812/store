<?php 
session_start();
	if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
	include "head.php"; 
	include "toolbaradmin.php";
	} else {
	echo "<script>alert('logeate sapo');self.location='../index.php';</script>";
	}
	include "conexion.php";
	$consulta="SELECT * FROM usuarios";
	$registro=mysql_query($consulta); 
?>
<center>
	<h2>Consulta general</h2>
		<table id="table">
			<thead>
				<tr>
					<th><h3 class="title">Nombre</h3></th>
					<th><h3 class="title">Apellido</h3></th>
					<th><h3 class="title">Usuario</h3></th>
					<th><h3 class="title">Correo</h3></th>
				 </tr>
			</thead>
			<tbody>
				<?php while ($row=mysql_fetch_array($registro)) { ?>
				<tr>
					<td class="title"><?php echo $row['nombre']; ?></p></td>
					<td class="title"><?php echo $row['apellido']; ?></td>
					<td class="title"><?php echo $row['nombre_usuario']; ?></td>
					<td class="title"><?php echo $row['correo']; ?></td>
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
