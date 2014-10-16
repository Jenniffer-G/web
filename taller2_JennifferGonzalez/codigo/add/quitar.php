<?php
	session_Start();
	include_once("../includes/database.php");

	$post = $_GET["id_producto"];


	$quitarId = "DELETE FROM carrito WHERE Id_producto=$post";
	$resultID=mysqli_query($cons,$quitarId);
	$idUser = "";
	
    header('location: ../carrito.php');
?>