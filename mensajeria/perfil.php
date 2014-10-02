<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lunion</title>
		<meta keywords="ejercicio HTML-CSS Mensajeria" description="Este es un ejercicio">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="css/style.css">
	</head>
<body>
	
	<header>
			<div id="nombre">
						<?php
							session_Start();
							include_once("includes/database.php"); 

							echo "<h1 >";
							$user = $_GET['usuario']; 
							echo "Perfil de ".$user . "<br>";
							echo "</h1>";
						?>
					</div>
		</header>

	<div class="container">
			<div class="navegacion">
				<nav>
					<ul class="list-inline list">
							<li class="lista"><a href="index.php"><h2>Home</h2></a></li>
							<li class="lista"><a href="logout.php"><h2>Salir</h2></a></li>
						</ul>
				</nav>
		</div>
	</div>
	<?php 

		$ID =mysql_query("SELECT usuarios.Id FROM mensajes.usuarios WHERE usuarios.Nombre= '$user'");
		while ($row = mysql_fetch_array($ID)) {
			$idUser = $row["Id"];
		}


		$mens = mysql_query("SELECT usuarios.Nombre, post.Titulo, post.Id_usuario, post.Post, post.Id_mensaje, usuarios.URL FROM mensajes.usuarios JOIN mensajes.post ON post.Id_usuario = usuarios.Id  WHERE Id_usuario = '$idUser'");  
		
		while ($row = mysql_fetch_array($mens)) {
			$url = $row["URL"];
			$nombre = $row["Nombre"];
			$post =$row["Post"];
			$titulo = $row["Titulo"];
			$mensaje = $row["Id_mensaje"];
			$idUsuario = $row["Id_usuario"];



				echo "<div class='contenedor'>";
					echo "<div class='post'>";
						echo "<div class='user'>";
							echo "<img src='$url' alt='usuario'>";
							echo "<form name='form' action='perfil.php' method='POST'>";
							echo "<a>$nombre</a>";
							
							echo "<br    />";
						echo "</div>";
						echo "</form>";
						echo "<div class='titulo'>$titulo</div>";
						echo "<div class='content'>$post</div>";
						$likes= "SELECT count(*) AS numLikes FROM mensajes.likes WHERE id_post='".$row["Id_mensaje"]."'";
						$rNumLikes = mysqli_query($cons,$likes);
						$numLikes = 0;
							while($rowB = mysqli_fetch_array($rNumLikes)){
								$numLikes = $rowB["numLikes"];
								echo "<div class='likes'>";
								echo "Like: $numLikes"; 
								echo "</div>";
							}
						$dislike= "SELECT count(*) AS numDislike FROM mensajes.dislike WHERE id_post='".$row["Id_mensaje"]."'";
						$rNumDislike = mysqli_query($cons,$dislike);
						$numDislike = 0;
							while($rowC = mysqli_fetch_array($rNumDislike)){
								$numDislike = $rowC["numDislike"];
								echo "<div class='Dislikes'>";
								echo "Dislike: $numDislike"; 
								echo "</div>";
							}									
					echo "</div>";
					echo "</div>";
					
					
		}
				//echo "<img src="css/imagenes/foto.png" alt="usuario">";						
		 ?>	
</body>
</html>