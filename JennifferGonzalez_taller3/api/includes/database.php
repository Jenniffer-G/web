<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "sitios";

	$con = mysqli_connect($host,$user,$pass, $database) or die("Error en la conexiòn con la base de datos: ");
	//echo "base de datos conectada";
?>