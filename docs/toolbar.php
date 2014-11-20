
<center>
	<ul class="toolbar">
		<li><a href="../index.php">Inicio</a></li>
			<li><a href="#">Productos</a>
				<ul>
					<?php 
						include "conexion.php";
						$consult = "SELECT * FROM categoria";
						$result = mysql_query($consult);
						while ($row=mysql_fetch_array($result)) {
						$nombre_categoria= $row['nombre'];	
						$id= $row['id_categoria'];
					?>
					<li><a href="catalogo.php?id=<?php echo $id; ?>"><?php echo $nombre_categoria; ?></a></li>
					<?php } ?>
				</ul>
			</li>
		<li>
			<a href="login.php">Entrar</a>
		</li>
		<li>
			<a href="addusuario.php">Registrar</a>
		</li>
	</ul>
</center>
