<?php
	error_reporting(0);
	session_start();
	session_unset();
	session_destroy();
	session_start();
	echo "<script>alert('Hasta luego');
		  self.location='../index.php';</script>";
	mysql_close();
?>
