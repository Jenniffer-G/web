
<!doctype html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title>Lunion</title>
		<meta keywords="ejercicio HTML-CSS Mensajeria" description="Este es un ejercicio">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<?php
		session_Start();
		include_once("includes/database.php"); 	

			 //Se busca el valoren la Base de Datos, segun su Nombre de campo....................................................................
		  	$query_cons =  "SELECT Nombre, URL FROM mensajes.usuarios WHERE 1";
			$result_cons = mysqli_query($cons,$query_cons);

			 $usuarios = [];

			while($row = mysqli_fetch_array($result_cons)){
				array_push($usuarios,$row["Nombre"]);
				$Nombre=$row['Nombre'];
			}//........................................................................................................................................
	?>
		<header>
			<div id="nombre">
						<!--<h1>Lunion</h1>-->
						<?php
							echo "<h1 >";
							echo "Bienvenido,  ".$_SESSION['user'];
							echo "</h1>";
						?>
					</div>
		</header>

		<div class="container">
			<div class="navegacion">
				<nav>
					<ul class="list-inline list">
							<li class="lista"><a href="#"><h2>Home</h2></a></li>
							<?php
							$ID =mysql_query("SELECT usuarios.Id FROM mensajes.usuarios WHERE usuarios.Nombre='".$_SESSION['user']."'");
							while ($row = mysql_fetch_array($ID)) {
								$idUser = $row["Id"];
							}
							echo "<li class='lista'>";
							$mens= mysql_query("SELECT * FROM mensajes.usuarios As user, mensajes.post AS msm WHERE user.Id=msm.Id_usuario");

							while ($row = mysql_fetch_array($mens)) {
								$nombre = $row["Nombre"];
								echo "<a href='favoritos.php?usuario='$Nombre'>";
							}
							echo "<h2>";
							echo "Favoritos";
							echo "</h2>";
							echo "</a>";
							echo "</li>";
							?>
							<li class="lista"><a href="logout.php"><h2>Salir</h2></a></li>
						</ul>
				</nav>
			</div>
			
				<?php 
				//$mens= mysql_query("SELECT * FROM mensajes.usuarios, mensajes.mensajes GROUP BY URL, Nombre, Post");
				$mens= mysql_query("SELECT * FROM mensajes.usuarios As user, mensajes.post AS msm WHERE user.Id=msm.Id_usuario ORDER BY msm.Id_mensaje");

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
									echo "<a href='perfil.php?usuario=$nombre'>$nombre</a>";
									
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
										echo "<a href='add/addLike.php?usuario=".$_SESSION['user']." &idPost= ".$mensaje."'>";
										echo "Like: $numLikes";
										echo "</a>"; 
										echo "</div>";
									}
								$dislike= "SELECT count(*) AS numDislike FROM mensajes.dislike WHERE id_post='".$row["Id_mensaje"]."'";
								$rNumDislike = mysqli_query($cons,$dislike);
								$numDislike = 0;
									while($rowC = mysqli_fetch_array($rNumDislike)){
										$numDislike = $rowC["numDislike"];
										echo "<div class='Dislikes'>";
										echo "<a href='add/addDislike.php?usuario=".$_SESSION['user']." &idPost= ".$mensaje."'>";
										echo "Dislike: $numDislike"; 
										echo "</a>";
										echo "</div>";
									}	
								$favoritos= "SELECT count(*) AS numFavoritos FROM mensajes.favoritos WHERE id_post='".$row["Id_mensaje"]."'";
								$IDfavoritos =mysql_query("SELECT * FROM mensajes.favoritos");
								$rNumFavoritos = mysqli_query($cons,$favoritos);
								$numFavoritos = " ";
								$direc = '#';
								$add = ' ';
									while($rowC = mysqli_fetch_array($rNumFavoritos)){
										while ($rowFav = mysql_fetch_array($IDfavoritos)) {
											if ($mensaje==$rowFav["Id_post"] && $idUser==$rowFav["Id_usuario"]) {
												if ($rowC["numFavoritos"]==1) {	
												$numFavoritos = "Tu favorito";
												}else if ($rowC["numFavoritos"]>=2) {
												$numFavoritos = "Tu favorito";
												}
											}
												if ($numFavoritos!='Tu favorito' && $idUser!=$idUsuario) {
												$direc="add/addFavoritos.php?usuario=".$_SESSION['user']." &idPost= ".$mensaje."";
												$add='añadir a favoritos';
											} else {
												$add='';
											}

										}
										echo "<div class='Favoritos'>";
										echo "$numFavoritos"; 
										echo "<a href='$direc'>$add</a>";
										echo "</div>";
									}							
							echo "</div>";
							echo "</div>";
							
							
				}
						//echo "<img src="css/imagenes/foto.png" alt="usuario">";						
				 ?>	
				<!--<div class="post">
					<div class="user">
						<img src="css/imagenes/foto.png" alt="usuario">
						<div>Nombre del usuario</div>
					</div>
					<div class="content">My money's in that office, right? If she start giving me some bullshit about it ain't there, and we got to go someplace else and get it, I'm gonna shoot you in the head then and there. Then I'm gonna shoot that bitch in the kneecaps, find out where my goddamn money is. She gonna tell me too. Hey, look at me when I'm talking to you, motherfucker.</div>
				</div>-->


			</div>
	</body>
	<footer>
		
	</footer>
</html>