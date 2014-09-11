<?php //POST es que estoy enviando
//get estoy recibiendo

	$host="localhost";
	$user= "root";
	$password = "";

	$con = mysqli_connect($host, $user, $password) or die("Error en la conexion con la base de datos");

	$creacion = $_POST["creacion"];//recibe las variables de nombre y las agrega a la nueva variable
	$finalizacion = $_POST["finalizacion"];
	$prioridad = $_POST["prioridad"];
	$descripcion = $_POST["descripcion"];
	$usuario = $_POST['usuario'];
	//echo "Mi nombre es " .$nombre;


	$query = "INSERT INTO gestion_de_tareas.tareas(`creacion`, `finalizacion`, `prioridad`, `descripcion`, `usuario`) VALUES ('$creacion', '$finalizacion', '$prioridad', '$descripcion', '$usuario')";
	$result = mysqli_query($con,$query);

	echo "a insertado los siguentes datos:";
	echo "<br><br>";
	echo "creacion: $creacion";
	echo "<br>";
	echo "finalizacion: $finalizacion";
	echo "<br>";
	echo "prioridad: $prioridad";
	echo "<br>";
	echo "descripcion: $descripcion";
	echo "<br>";
	echo "usuario: $usuario";
	echo "<br><br>";
?>

<a href="tabla.php">Regresar</a>