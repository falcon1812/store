<?php 
session_start();
error_reporting(0);
if ($_SESSION['tipo']=='administrador' && $_SESSION['estado']=='auntenticado') {
 	include "head.php"; 
	include "toolbaradmin.php";  	
 } else {
 	include "head.php"; 
 	include "toolbar.php";
 }
?>
<center>
	<form method="POST" action="addusuario.php" onsubmit="checkPasswordMatch()">
		<h2>Registro de Usuario</h2>
			<table>
				<tr>
					<td class="title">Nombre</td>
					<td class="title"><input type="text" value="" name="nombre" required ></td>
				</tr>
				<tr>
					<td class="title">Apellido</td>
					<td class="title"><input type="text" value="" name="apellido" required ></td>
				</tr>
				<tr>
					<td class="title">Nombre de usuario</td>
					<td class="title"><input type="text" value="" name="nombre_usuario" required ></td>
				</tr>
				<tr>
					<td class="title">Contraseña</td>
					<td class="title"><input type="password" value="" name="password" id="password" required ></td>
				</tr>
				<tr>
					<td class="title">Repita contraseña</td>
					<td class="title"><input type="password" value="" name="password1" id="password1" onkeyup="checkPass(); return false;" required></td>
					<p><span id="confirmMessage" class="confirmMessage"></span></p>
				</tr>
				<tr>
					<td class="title">Correo</td>
					<td class="title"><input type="email" value="" name="correo" required ></td>
			<tr>
				<td class="title"><input type="submit" value="Registrar" name="registrar" ></td>
			</tr>
			</table>
	</form>
</center>
	<script>
		function checkPass() {
			var pass1 = document.getElementById('password');
			var pass2 = document.getElementById('password1');
			var message = document.getElementById('confirmMessage');
			var goodColor = "#66cc66";
			var badColor = "#ff6666";
			if(pass1.value == pass2.value){
				pass2.style.backgroundColor = goodColor;
				message.style.color = goodColor;
				message.innerHTML = "Las contraseñas coinciden"
			}else{
				pass2.style.backgroundColor = badColor;
				message.style.color = badColor;
				message.innerHTML = "Las contraseñas no coinciden"
				}
			}
	</script>
<?php
	if (isset($_POST['registrar'])) {
		include "conexion.php";
		$consulta="SELECT * FROM usuarios WHERE nombre_usuario='".$_POST['nombre_usuario']."' OR  correo='".$_POST['correo']."'";
		$resultado = mysql_query($consulta);
		$row = mysql_num_rows($resultado);
			if ($row== 0) 	{
						$nombre = $_POST['nombre'];
						$nombre_usuario = $_POST['nombre_usuario'];
						$apellido = $_POST['apellido'];
						$password = $_POST['password'];
						$correo = $_POST['correo'];
					$insertar = "INSERT INTO usuarios VALUES(NULL,'$nombre','$apellido','$nombre_usuario','$password','$correo','2')";
					$resultadoinsert = mysql_query($insertar);
					echo "<script>alert('Registro guardado');
					self.location='../index.php';</script>";
			/* mensaje completo del mail */
			$subject = "Bienvenido a Cocoa :D";
			$headers = "Holis";
			$message = "Bienvenido $nombre";
			mail($correo, $subject, $message, $headers);
							} else {
					echo "<script>alert('Usuario ya existe');</script>";
							}
					}
	include "foot.php";
?>
