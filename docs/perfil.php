<?php
session_start();
 if ($_SESSION['tipo']=='estandar' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbar2.php";  	
		if(isset($_SESSION['usuario'])) {
			include "conexion.php";
				$nombre_usuario = $_SESSION['usuario'];
				$consulta="SELECT * FROM usuarios WHERE nombre_usuario= '$nombre_usuario'";
				$resultado=mysql_query($consulta);
				$row=mysql_num_rows($resultado);
			if ($row==0) {
				echo "<script>alert('No existe');
							  self.location='modificar.php';
					  </script>";
			} else {
					$consulta="SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario'";
					$resconsulta=mysql_query($consulta);
						while ($row=mysql_fetch_array($resconsulta)) 
				{
?>
<center>
		<h2><?php echo $_SESSION['usuario']; ?></h2>
		<form name="" action="modificarperfil.php" method="POST">
			<table>
				<tr>
					<td class="title"><p>Nombre</p></td>
					<td class="title"><input type="text" name="nombre" id="nombre" required value="<?php echo $row['nombre']; ?>"></td>
				</tr>
				<tr>
					<td class="title"><p>Apellido</p></td>
					<td class="title"><input type="text" name="apellido" id="apellido" required value="<?php echo $row['apellido']; ?>"></td>
				</tr>
				<tr>
					<td class="title"><p>Nombre de Usuario</p></td>
					<td class="title"><input type="text" name="apellido" id="apellido" required value="<?php echo $row['nombre_usuario']; ?>"></td>
				</tr>
				<tr>
					<td class="title"><p>Contraseña</p></td>
					<td class="title"><input type="password" name="password" id="password" required value="<?php echo $row['password']; ?>"></td>
				</tr>
				<tr>
					<td class="title"><p>Correo</p></td>
					<td class="title"><input type="email" name="correo" id="correo" required value="<?php echo $row['correo']; ?>"></td>
				</tr>
			</table>
				<p>¿ Esta seguro que desea modificar este perfil ?</p>
				<p>SI<input type="radio" value="V" name="respuesta" id="respuesta1" required></p>
				<p>NO<input type="radio" value="F" name="respuesta" id="respuesta2"></p>
				<p><input type="submit" value="Modificar"></p>
			<input type="hidden" value="<?php echo $nombre_usuario; ?>" name="nombre_usuario" id="nombre_usuario">
		</form>	
	</center>
<?php
					}
				}
			}
		} else {
		echo "<script>alert('Acceso denegado');
			          self.location='../index.php';
			  </script>";
	}
		include "foot.php";
?>
