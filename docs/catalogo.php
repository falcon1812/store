<?php 
session_start();
error_reporting(0);
	if ($_SESSION['tipo']=='estandar' && $_SESSION['estado']=='auntenticado') {
		include "head.php"; 
		include "toolbar2.php";
	} else {
		include "head.php"; 
		include "toolbar.php";
	}
	include "conexion.php";
	$id_categoria= $_GET['id'];
	$consulta="SELECT * FROM producto WHERE id_categoria=".$id_categoria;
	$registro=mysql_query($consulta);
	$i=0;
?>
<center>
	<table>	
		<tr>
		<?php while ($row=mysql_fetch_array($registro)) {
		$nombre_producto= $row['nombre_producto'];	
		$foto= $row['foto'];
		?>
			<td>
				<p class="title"><?php echo $row['nombre_producto']; ?></p>
				<p><a href="about.php?id=<?php echo $row['id_producto'];?>"><img src='<?php echo $foto ?>' class="img" alt="<?php echo $row['nombre_producto']; ?>"></a></p>
			</td>
		<?php 
		$i++;
			if ($i%4==0)
			{
				echo "</tr><tr>";
			}
		}
		?>
		</tr>
	</table>
</center>
	<?php include "foot.php"; ?>
