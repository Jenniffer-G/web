<?php
	session_Start();
	include_once("../includes/database.php");

	$producto = $_GET["id_producto"];
	$fecha = $_GET['fecha'];
	$usuario = $_SESSION['user'];


	$traerID = "SELECT usuarios.Id FROM carro_de_compras.usuarios WHERE usuarios.Nombre= '$usuario'";
	$resultID=mysqli_query($cons,$traerID);
	$idUser = "";

	while ($row = mysqli_fetch_array($resultID)) {
		$idUser = $row["Id"];
		echo "mi nombre es: ". $usuario;
		echo "mi ID es: ". $idUser;
		
		$query = "INSERT INTO carro_de_compras.perfil (Id_producto, Id_usuario, fecha) VALUES ('$producto','$idUser','$fecha')";
		$result=mysqli_query($cons,$query);
	}

	$quitarId = "DELETE FROM carrito WHERE Id_producto=$producto";
	$resultID=mysqli_query($cons,$quitarId);
	$idUser = "";
	
	
    header('location: ../index.php');
?>