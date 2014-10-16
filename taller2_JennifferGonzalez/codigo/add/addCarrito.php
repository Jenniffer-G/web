<?php
	session_Start();
	include_once("../includes/database.php");

	$post = $_GET["id_producto"];
	$usuario = $_SESSION['user'];

	echo "<h1 >";
	echo "Bienvenido,  ".$_SESSION['user'];
	echo "$post";
	echo "</h1>";


	$traerID = "SELECT usuarios.Id FROM carro_de_compras.usuarios WHERE usuarios.Nombre= '$usuario'";
	$resultID=mysqli_query($cons,$traerID);
	$idUser = "";

	while ($row = mysqli_fetch_array($resultID)) {
		$idUser = $row["Id"];

		$query = "INSERT INTO carro_de_compras.carrito (Id_usuario, Id_producto, Id_carrito) VALUES ('$idUser','$post','')";
		$result=mysqli_query($cons,$query);
	}
	
    header('location: ../carrito.php');
?>