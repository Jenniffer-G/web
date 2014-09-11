<?php 

	$host="localhost";
	$user= "root";
	$password = "";
	$name="gestion_de_tareas";

	$con = mysql_connect($host, $user, $password) or die("Error en la conexion con la base de datos");
	$cons = mysqli_connect($host, $user, $password) or die("Error en la conexion con la base de datos");
	mysql_select_db($name,$con)or die("Error en: $name: " . mysql_error());; 	

?>