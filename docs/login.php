<?php 	
	include "head.php"; 
	include "toolbar.php"; 
?>
<center>
	<form method="POST" action="validar.php" style="margin-bottom: 18%">
		<h2>Inicio de Sesion</h2>
			<table>
				<tr>
					<td class="title">Nombre de usuario</td>
					<td class="title"><input type="text" name="nombre_usuario" required></td>
				</tr>
				<tr>
					<td class="title">Contraseña</td>
					<td class="title"><input type="password" name="password" required></td>
				</tr>
				<tr>
					<td class="title"><input type="submit" name="entrar" value="entrar"></td>
				</tr>
			</table>
	</form>
</center>
<?php include "foot.php"; ?>
