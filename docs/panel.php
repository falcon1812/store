<?php
session_start();
if (($_SESSION['tipo']=='administrador') && ($_SESSION['estado']=='auntenticado')) {
	include "head.php"; 
	include "toolbaradmin.php";
	echo "<br><center><h1 style='margin-bottom:20%'>bienvenido ".$_SESSION['usuario']."</h1></center>";
	include "foot.php"; 
	} else {
	echo "<script>alert('Acceso denegado');
	              self.location='../index.php';
		  </script>";
	}
?>
