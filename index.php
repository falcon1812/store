<?php 	
error_reporting(0);
session_start();
if ($_SESSION['tipo']=='estandar' && $_SESSION['estado']=='auntenticado')
{
	include "docs/conexion.php";
 	include "docs/head2.php"; 
	include "docs/toolbari2.php";
 } else {
 	include "docs/head2.php"; 
 	include "docs/toolbari.php";
 }
	include "docs/banner.php";
	include "docs/search.php";
	include "docs/footi.php";
 ?>
