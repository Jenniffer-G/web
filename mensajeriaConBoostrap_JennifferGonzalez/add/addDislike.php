<?php
	include_once("../includes/database.php");

	$usuario = $_GET["usuario"];
	$post = $_GET["idPost"];


	$traerID = "SELECT usuarios.Id FROM mensajes.usuarios WHERE usuarios.Nombre= '$usuario'";
	$resultID=mysqli_query($cons,$traerID);
	$idUser = 
	print($usuario);

	while ($row = mysqli_fetch_array($resultID)) {
		$idUser = $row["Id"];
		echo "mi nombre es: ". $usuario;
		echo "mi ID es: ". $idUser;
		
		$query = "INSERT INTO mensajes.dislike (id, id_post, numDislike) VALUES ('$idUser','$post','')";
		$result=mysqli_query($cons,$query);
	}

	
	
	
    header('location: ../index.php');

?>