<?php
if (strstr($_SERVER['REQUEST_URI'],'index.php')){
    header('HTTP/1.0 404 Not Found');
    echo "<center><h1>404 Not Found</h1></center>";
    echo "<center>The page that you have requested could not be found.</center>";
	echo "<center>Arranca de aqui sapo</center>";
    exit();
	mysql_close();		
}
?>
