<div class="van">
	<form method="POST">
		<p>Buscar: <input type="text" name="busqueda" style="float: none" required/><input type="image" src="images/search.png" class="imgbutton" style="float: none" name="button" alt="Buscar" ></p>
	</form>
</div>
<?php
	if($_POST['busqueda']!=''){
		if(isset($_POST['busqueda'])) {
			include "conexion.php";
			$nombre = $_POST['busqueda'];
			$consulta="SELECT * FROM producto WHERE nombre_producto LIKE '%$nombre%'";
			$resultado= mysql_query($consulta);
				while ($row = mysql_fetch_array($resultado)) {
					if(isset($row['id_producto'])==' ') {
				echo "<center><a class='hiper' href='docs/about.php?id=".$row['id_producto']."'>".$row['nombre_producto']."</a></center><br>";
					} else {
				echo "<center><p>".$nombre." no fue encontrado</p></center>";
					}
				}
			}
		}
?>
