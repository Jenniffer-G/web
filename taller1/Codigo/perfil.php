<?php

	$host="localhost";
	$user= "root";
	$password = "";
	$db="gestion_de_tareas";

	$enlace = mysql_connect($host,$user,$password);
	mysql_select_db($db,$enlace);

	$usuario = $_POST['usuario'];

	$consulta =  mysql_query("SELECT * FROM gestion_de_tareas.tareas WHERE usuario LIKE '$usuario' ORDER BY creacion, prioridad",$enlace);//agrego un order by para ordenar la tabla por fecha de creacion y prioridad

	echo "<h1 >";
	echo "Perfil de: ".$usuario;
	echo "</h1>";
	echo "<hr size='8' color='00000' >";
?>
	
	
	<table width="100%">
    <!-- <td width='22%'><h2>Usuario</h2></td> -->
    <td width='22.5%'><h2>Creacion</h2></td>		
    <td width='22.5%'><h2>Finalizacion</h2></td>
    <td width='25.1%'><h2>Prioridad</h2></td>
    <td width='25.2%'><h2>Descripcion</h2></td>
  	</table/>

<?php
	
	while ($row = mysql_fetch_array($consulta)) {
		// $usuario = $row["usuario"];		
		$creacion = $row["creacion"];
		$finalizacion = $row["finalizacion"];
		$prioridad = $row["prioridad"];
		$descripcion = $row["descripcion"];


	echo "<table style='width:100%'>";
	// echo "<td width='22%'>$usuario</td>";
	echo "<td width='22%'>$creacion</td>";
	echo "<td width='21%'>$finalizacion</td>";
	echo "<td width='22%'>$prioridad</td>";
	echo "<td width='22%'>$descripcion</td>";
	echo "</table>";
	}
	echo "<hr size='8'  color='00000'>";
	echo "<a href='tabla.php'>Volver</a> <br   />";

?>