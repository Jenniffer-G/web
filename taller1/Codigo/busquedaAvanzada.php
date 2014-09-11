<?php

	$host="localhost";
	$user= "root";
	$password = "";
	$db="gestion_de_tareas";

	$enlace = mysql_connect($host,$user,$password);
	mysql_select_db($db,$enlace);

	$usuario = $_POST['usuario'];
	$creacion = $_POST['creacion'];
	$finalizacion = $_POST['finalizacion'];
	$prioridad = $_POST['prioridad'];
	$descripcion = $_POST['descripcion'];


	$consulta =  mysql_query("SELECT * FROM gestion_de_tareas.tareas WHERE usuario LIKE '$usuario' or creacion LIKE '$creacion' or finalizacion LIKE '$finalizacion' or prioridad LIKE '$prioridad' or descripcion LIKE '$descripcion' ORDER BY creacion, prioridad ",$enlace);

	echo "<h1 >";
	echo "Resultado de la busqueda";
	echo "</h1>";
	echo "<hr size='8' color='00000' >";
?>
	
	
	<table width="100%">
    <td width='22%'><h2>Usuario</h2></td>
    <td width='20.5%'><h2>Creacion</h2></td>		
    <td width='20.5%'><h2>Finalizacion</h2></td>
    <td width='22.1%'><h2>Prioridad</h2></td>
    <td width='25.2%'><h2>Descripcion</h2></td>
  	</table/>

<?php
	
	while ($row = mysql_fetch_array($consulta)) {
		$usuario = $row["usuario"];		
		$creacion = $row["creacion"];
		$finalizacion = $row["finalizacion"];
		$prioridad = $row["prioridad"];
		$descripcion = $row["descripcion"];


	echo "<table style='width:100%'>";
	echo "<td width='22%'>$usuario</td>";
	echo "<td width='22%'>$creacion</td>";
	echo "<td width='21%'>$finalizacion</td>";
	echo "<td width='22%'>$prioridad</td>";
	echo "<td width='22%'>$descripcion</td>";
	echo "</table>";
	}
	echo "<hr size='8'  color='00000'>";
	echo "<a href='tabla.php'>Volver</a> <br   />";

?>