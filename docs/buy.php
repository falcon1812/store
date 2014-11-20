<?php
session_start();
include "head.php"; 
	if ($_SESSION['tipo']=='estandar' && $_SESSION['estado']=='auntenticado') {
		include "toolbar2.php";
		include "conexion.php";
		$id = $_GET['id'];
		$consulta = "SELECT * FROM producto WHERE id_producto=".$id;
		$resultado=  mysql_query($consulta);
		$row = mysql_fetch_array($resultado);
		echo "<script>alert('Acabas de comprar ".$row[1]."');</script>";
?>
<center>
	<h2>Compras</h2>
	<table style="margin-bottom: 18%;"> 
		<tr>
			<td class="title"><?php echo $row[1]; ?></td>
			<td class="title"><?php echo $row[2]; ?></td>
			<td class="title"><?php echo $row[4]; ?></td>
			<td class="title"><a href="<?php echo $row[5]; ?>" rel="shadowbox"><img src="<?php echo $row[5]; ?>" class="mini" rel="shadowbox"></a></td>
		</tr>
	</table>
</center>
<script>
	$(document).ready(function() {
		Shadowbox.init();
	} );
</script>
<?php
	include "foot.php";
	} else {
		echo "<script>alert('Accesso denegado');
				      self.location='../index.php';
			  </script>";
	}
?>
