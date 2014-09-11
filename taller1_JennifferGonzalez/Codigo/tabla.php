
<!DOCTYPE html> 
<html> 
<head> 
<title>php_prueba</title> 



</head> 
<body> 

<header> 

</header> 

<nav id ="enlaces"> 
<?php 
session_Start();
include_once("conexion.php"); 

	echo "<h1 >";
	echo "Bienvenido,  ".$_SESSION['user'];
	echo "</h1>";
	echo "<a href='logout.php'>Salir</a> <br   />";
	echo "<hr size='8'  color='00000'> ";

	 //Se busca el valoren la Base de Datos, segun su Nombre de campo....................................................................
  	$query_cons =  "SELECT usuario FROM gestion_de_tareas.usuarios WHERE 1";
	$result_cons = mysqli_query($cons,$query_cons);

	 $usuarios = [];

	while($row = mysqli_fetch_array($result_cons)){
		array_push($usuarios,$row["usuario"]);
	}
	//........................................................................................................................................
?> 
</nav> 

<form name="form" action="insertarDatos.php" method="POST">
<strong>
<h2>Insertar tareas</h2>
</strong>

<h5>Seleccione la prioridad:
<select name="prioridad">
<option value="alta">Alta</option>
<option value="media">Media</option>
<option value="baja">Baja</option>
</select>

<br></br>

</h5>

<h5>
Fecha de creacion: <input name="creacion" type="date">
</h5>

<h5>
Fecha de finalizacion: <input name="finalizacion" type="date">
</h5>

<h5>
Descripcion: <input name="descripcion" type="text">
</h5>

<?php
echo "<h5>Usuario al que se le asigna la tarea: ";
echo "<select name='usuario'>";
for ($i=0; $i < sizeof($usuarios); $i++) { 
		echo "<option>".$usuarios[$i]."</option>";
	}
echo "</select>";
echo "</h5>";	
?>

<hr size="4" color="ffffff" width="100%" align="lefth">
<input name="Enviar" type="submit" value="Enviar">

</form>

<hr size='8'  color='00000'>
<!-- //............................................................................................................................................................ -->
<form name="form" action="perfil.php" method="POST">
<strong>
<h2>Perfiles</h2>
</strong>

<?php
echo "<h5>Vista de los perfiles: ";
echo "<select name='usuario'>";
for ($i=0; $i < sizeof($usuarios); $i++) { 
		echo "<option>".$usuarios[$i]."</option>";
	}
echo "</select>";
echo "</h5>";	
?>

<hr size="4" color="ffffff" width="100%" align="lefth">
<input name="Enviar" type="submit" value="Enviar">

</form>
<hr size='8'  color='00000'>

<!-- //............................................................................................................................................................ -->
<form name="form" action="busquedaAvanzada.php" method="POST">
<strong>
<h2>Busqueda de tareas</h2>
<h3>Llene por lo menos uno de los campos</h3>
</strong>

<h5>Seleccione la prioridad:
<select name="prioridad">
<option>---</option>;
<option value="alta">Alta</option>
<option value="media">Media</option>
<option value="baja">Baja</option>
</select>

<br></br>

</h5>

<h5>
Fecha de creacion: <input name="creacion" type="date">
</h5>

<h5>
Fecha de finalizacion: <input name="finalizacion" type="date">
</h5>

<h5>
Descripcion: <input name="descripcion" type="text">
</h5>

<?php
echo "<h5>Vista de los perfiles: ";
echo "<select name='usuario'>";
echo "<option>---</option>";
for ($i=0; $i < sizeof($usuarios); $i++) { 
		echo "<option>".$usuarios[$i]."</option>";
	}
echo "</select>";
echo "</h5>";	
?>

<hr size="4" color="ffffff" width="100%" align="lefth">
<input name="Enviar" type="submit" value="Enviar">

</form>


</body> 

</html> 