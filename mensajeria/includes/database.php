<?php
	  $hostname = "localhost";
	  $user = "root";
	  $password = "";
	  $name = "mensajes";

	$con = mysql_connect($hostname, $user, $password, $name) or die("Error en la conexion con la base de datos");
	$cons = mysqli_connect($hostname, $user, $password, $name) or die("Error en la conexion con la base de datos");
	mysql_select_db($name,$con)or die("Error en: $name: " . mysql_error()); 

?>
