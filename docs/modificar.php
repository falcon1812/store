<?php
session_start();
 if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
?>
<form name="" method="post">
	<center>
		<h2>Modificar Usuario</h2>
		<table width="500" border="0">
			<tr>
				<td class="title">Nombre de Usuario</td>
				<td><input type="text" name="nombre_usuario" id="nombre_usuario" required></td>
			</tr>
			<tr>
				<td class="title"><input type="submit" value="buscar"></td>
			</tr>
		</table>
	</center>
</form>
<?php
if(isset($_POST['nombre_usuario'])) {
	include "conexion.php";
		$nombre_usuario = $_POST['nombre_usuario'];
		$consulta="SELECT * FROM usuarios WHERE nombre_usuario LIKE '%$nombre_usuario%'";
		$resultado=mysql_query($consulta);
		$row=mysql_num_rows($resultado);
		if ($row==0) {
			echo "<script>alert('No existe');
						  self.location='modificar.php';
				  </script>";
		} else {
				$consulta="SELECT * FROM usuarios WHERE nombre_usuario LIKE '%$nombre_usuario%'";
				$resconsulta=mysql_query($consulta);
					while ($row=mysql_fetch_array($resconsulta)) 
			{
?>
<center>
	<h1>Registro a Modificar</h1>
		<form name="form1" action="modificar2.php" method="POST">
			<table width="400" border="1">
				<tr>
					<td class="title">Nombre</td>
					<td><input type="text" name="nombre" id="nombre" required value="<?php echo $row['nombre']; ?>"></td>
				</tr>
				<tr>
					<td class="title">Apellido</td>
					<td><input type="text" name="apellido" id="apellido" required value="<?php echo $row['apellido']; ?>"></td>
				</tr>
				<tr>
					<td class="title">nombre de Usuario</td>
					<td><input type="text" name="apellido" id="apellido" required value="<?php echo $row['nombre_usuario']; ?>"></td>
				</tr>
				<tr>
					<td class="title">Password</td>
					<td><input type="text" name="password" id="password" required value="<?php echo $row['password']; ?>"></td>
				</tr>
				<tr>
					<td class="title">Correo</td>
					<td ><input type="email" name="correo" id="correo" required value="<?php echo $row['correo']; ?>"></td>
				</tr>
			</table>
				<p>Esta seguro que desea modificar este registro</p>
				<p>SI<input type="radio" value="V" name="respuesta" id="respuesta1"></p>
				<p>NO<input type="radio" value="F" name="respuesta" id="respuesta2"></p>
				<p><input type="submit" value="Modificar"></p>
			<input type="hidden" value="<?php echo $nombre_usuario; ?>" name="nombre_usuario" id="nombre_usuario">
		</form>	
</center>
<br>
<?php
				}
			}
		}
	} else {
	echo "<script> alert('Acceso denegado');
		self.location='../index.php';
		  </script>";
 	}
	include "foot.php";
?>
