<?php
session_start();
error_reporting(0);
include "head.php";
	if ($_SESSION['tipo']=='estandar' && $_SESSION['estado']=='auntenticado') {
		$buy = $_GET['id'];
		include "toolbar2.php";
		echo "<center><a href='buy.php?id=".$buy."'><button class='button'>Comprar</button></a><center>";
	} else {
		include "toolbar.php";
		echo "<center><a href='addusuario.php'><button class='button'>Registrar</button></a></center>";
	}
	$id = $_GET['id'];
	include "conexion.php";
	$consulta="SELECT * FROM producto WHERE id_producto=".$id;
	$resultado=mysql_query($consulta);
	$row=mysql_fetch_array($resultado);
	$foto= $row['foto'];
?>
	<center>
		<div class="thumb" id="e">
			<p class="back"><b>Descripción</b><br><?php echo $row['descripcion_producto']; ?><br><b>Disponibilidad</b><br><?php echo $row['cantidad']; ?><br><b>Precio</b><br><?php echo $row['precio']; ?></p>
			<a style="background:url(<?php echo $foto; ?>);background-size: 280px 360px;">
				<span><?php echo $row['nombre_producto']; ?></span>
			</a>
		</div>
	</center>
<?php include "foot.php"; ?>
