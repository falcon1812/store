<?php 	
session_start();
if (($_SESSION['tipo']=='administrador') && ($_SESSION['estado']=='auntenticado')) {
 	include "head.php"; 
	include "toolbaradmin.php";  	
 ?>
<center>
	<h2>Eliminar usuario</h2>
	 <form action="" method="POST">
		<table>
			<tr>
				<td class="title">Nombre de usuario</td>
				<td class="title"><input type="search" name="nombre_usuario" required></td>
			</tr>
			<tr>
				<td class="title"><input type="submit" name="buscar"></td>
			</tr>
		</table>
	 </form>
</center>
<?php
	include "conexion.php";
	if (isset($_POST['nombre_usuario'])) {
		$usuario = $_POST['nombre_usuario'];
		$consulta="SELECT * FROM usuarios WHERE nombre_usuario LIKE '%$usuario%'";
		$resultado =mysql_query($consulta);
		$row=mysql_num_rows($resultado);
		if ($row==0){
			echo "<script>alert('El usuario no existe');
				          self.location='delete.php';
				  </script>";
		} else {
			$fila=mysql_fetch_array($resultado);
?>
<table>
	<tr>
		<td class="title"><?php echo $fila['nombre']; ?></td>
		<td class="title"><?php echo $fila['apellido']; ?></td>
		<td class="title"><?php echo $fila['correo']; ?></td>
		<td class="title"><?php echo $fila['nombre_usuario']; ?></td>
	</tr>
</table>
<form action="delete2.php" method="POST">
	<table>
		<tr>
			<td class="title">Está seguro que desea eleminar este registro?</td>
		</tr>
		<tr>
			<td class="title">Si <input type="radio" name="opcion" id="opcion1" value="V" required></td>
			<td class="title">No <input type="radio" name="opcion" id="opcion2" value="F" required></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
				<input type="submit" name="submit" value="Continuar">
			</td>
		</tr>
	</table> 
</form>
<?php		
		}
	}
	include "foot.php";
	} else {
 	"<script>alert('Acceso denegado');
		    self.location='../index.php';
     </script>";
 }
?>		
