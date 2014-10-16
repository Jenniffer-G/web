<!DOCTYPE html>
<html lang="es">
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
<body>
	<?php
		session_Start();
		include_once("includes/database.php"); 	

		if(!isset($_SESSION['userid'])) { 
			 ?>
			 <form name="formulario" method="POST" action="login.php">
			 	<input type="hidden" name="log" value="1">
			 	<script type="text/javascript">document.formulario.submit()</script>
			 </form>
			 <?php
		}

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
				echo "Bienvenido,  ".$_SESSION['user'];
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
		      <a class="navbar-brand" href="#">Home</a>
		   </div>
		   <div class="collapse navbar-collapse" id="example-navbar-collapse">
		      <ul class="nav navbar-nav">
			      <ul class="nav navbar-nav">
				      	<li ><a href='catalogo.php'>Catalogo</a></li>
				      	<li ><a href='perfil.php'>Perfil</a></li>
				        <li><a href="logout.php">Salir</a></li>
			      </ul>
		   	</div>
		</div>
	</nav>

	<div id="carousel-example-generic" class="carousel slide container" data-ride="carousel" style="width: 100%">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    <div class="item active">
		      <img src="img/chocolate.png" alt="chocolate" width="100%">
		      <div class="carousel-caption">
		        Chocolate
		      </div>
		    </div>
		    <div class="item">
		      <img src="img/dulces.png" alt="...">
		      <div class="carousel-caption">
		        Dulces
		      </div>
		    </div>
		    <div class="item">
		      <img src="img/candy.png" alt="...">
		      <div class="carousel-caption">
		        Postres
		      </div>
		    </div>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		  </a>
	</div>
	<div class="dest"> 
	<h2>...Destacados...</h2>
	</div>		
		<?php

			$query_destacado = mysql_query("SELECT distinct productos.Producto, productos.Precio, productos.Id_producto,productos.Descripcion, productos.URL FROM carro_de_compras.productos JOIN carro_de_compras.Perfil ON Perfil.Id_producto = productos.Id_producto WHERE 1 ORDER BY Id_perfil DESC LIMIT 5");

			while($row = mysql_fetch_array($query_destacado)){
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
						
						echo "<div class='bot'>";
						echo "<a href='carrito.php' class='btn btn-info btn-lg'>";
						echo "<span class='glyphicon glyphicon-shopping-cart'></span>";
						echo "</a>";
						echo "</div>";

						echo "<h1>";
						echo "$title";
						echo "</h1>";
						echo "<h3>";
						echo "Precio: $precio";

						echo "<a href='add/addCarrito.php?id_producto=".$producto."' class='btn btn-info btn-lg'>";
						echo "<span class='glyphicon glyphicon-plus-sign'>  Agregar al carrito</span>";
						echo "</a>";

						echo "</h3>";
						echo "<h4>";
						echo "$description";
						echo "</h4>";

					echo "</div>";

				echo "</div>";
			}

		?>

</div>
</body>
</html>

