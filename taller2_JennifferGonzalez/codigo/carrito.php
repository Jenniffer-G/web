<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Lunion</title>
        <meta keywords="ejercicio HTML-CSS Mensajeria" description="Este es un ejercicio">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link href='http://fonts.googleapis.com/css?family=Scada:400italic,400' rel='stylesheet' type='text/css'>
        
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript" src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
		<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">
    	<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
	        </head>
	</head>
<body>
	<?php
		session_Start();
		include_once("includes/database.php"); 	

			 //Se busca el valoren la Base de Datos, segun su Nombre de campo....................................................................
		  	$query_cons =  "SELECT Nombre, URL FROM carro_de_compras.usuarios WHERE 1";
			$result_cons = mysqli_query($cons,$query_cons);

			 $usuarios = [];

			while($row = mysqli_fetch_array($result_cons)){
				array_push($usuarios,$row["Nombre"]);
				$Nombre=$row['Nombre'];
			}//........................................................................................................................................
			$ID =mysql_query("SELECT usuarios.URL FROM carro_de_compras.usuarios WHERE usuarios.Nombre='".$_SESSION['user']."'");
				while ($row = mysql_fetch_array($ID)) {
				$URLUser = $row["URL"];
			}
	?>
	<header>
	
		<div id="nombre" class="user">
			<?php
				echo "<img class='redondo' src='$URLUser' alt='usuario'>";
				echo "<h1 >";
				echo "Carrito de compras,  ".$_SESSION['user'];
				echo "<hr>";
				echo "</h1>";
			?>
		</div>
	</header>
	<nav class="navbar navbar-default" role="navigation">
			<div class="barra">
  				<div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" 
			         data-target="#example-navbar-collapse">
			         <span class="sr-only">Home</span>
			         <span class="icon-bar"></span>
			         <span class="icon-bar"></span>
			         <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="index.php">Home</a>
			   </div>
			   <div class="collapse navbar-collapse" id="example-navbar-collapse">
			      <ul class="nav navbar-nav">
			      	<li ><a href='catalogo.php'>Catalogo</a></li>
			      	<li ><a href='perfil.php'>Perfil</a></li>					
			         <li><a href="logout.php">Salir</a></li>
			      </ul>
			   	</div>
			</div>
		</nav>

		<div class="cat">
			<img src="img/carrito.png">
		</div>

		<div class="desta"> 
			<h2>...</h2>
		</div>	


		<?php
			date_default_timezone_set('America/Bogota');
			$hoy = date("F j, Y");


			$ID =mysql_query("SELECT usuarios.Id FROM carro_de_compras.usuarios WHERE usuarios.Nombre='".$_SESSION['user']."'");
			while ($row = mysql_fetch_array($ID)) {
				$idUser = $row["Id"];
			}

			$compras = mysql_query("SELECT productos.Producto, productos.Precio, productos.Id_producto, productos.Descripcion, productos.URL FROM carro_de_compras.productos JOIN carro_de_compras.carrito ON carrito.Id_producto = productos.Id_producto WHERE carrito.Id_usuario = '$idUser'");

			while ($row = mysql_fetch_array($compras)) {
				$title=$row['Producto'];
				$URL_prod=$row['URL'];
				$description=$row['Descripcion'];
				$precio=$row['Precio'];
				$producto=$row["Id_producto"];

				echo "<div class='producto'>";

				echo "<div class='rect'><br  /> </div>";

				echo "<div class='rectDos'><br  /> </div>";

					echo "<div class='imagen'>";
					echo "<img src='$URL_prod' alt='usuario'>";
					echo "</div>";

						echo "<div class='desc'>";
						echo "<h1>";
						echo "$title";
						echo "</h1>";
						echo "<h3>";
						echo "Precio: $precio";

						echo "<a href='add/quitar.php?id_producto=".$producto."' class='btn btn-info btn-lg'>";
						echo "<span class='glyphicon glyphicon-minus-sign'>  Quitar</span>";
						echo "</a>";

						echo "<a href='add/Comprar.php?id_producto=".$producto." &fecha=".$hoy."' class='btn btn-info btn-lg'>";
						echo "<span class='glyphicon glyphicon-shopping-cart'> Comprar</span>";
						echo "</a>";

						echo "</h3>";
						echo "<h4>";
						echo "$description";
						echo "</h4>";

						echo "<br   />";

					echo "</div>";

				echo "</div>";
			}  
		?>
</div>
</body>
</html>