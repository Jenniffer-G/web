<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lunion</title>
        <meta keywords="ejercicio HTML-CSS Mensajeria" description="Este es un ejercicio">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" href="css/style_login.css">
    </head>
    <header>
        <?php 
            session_start();
            include_once("includes/database.php");  
              
            function verificar_login($user,$password,&$result) { 

                $sql = "SELECT * FROM mensajes.usuarios WHERE Nombre = '$user' and password = '$password'"; 
                $rec = mysql_query($sql) or die('Mi error es: '.mysql_error()); 
                $count = 0; 
              
                while($row = mysql_fetch_object($rec)) 
                { 
                    $count++; 
                    $result = $row; 
                } 
              
                if($count == 1) 
                { 
                    return 1; 
                } 
              
                else 
                { 
                    return 0; 
                } 
            } 
        ?> 

    </header>
    <body>
        <form action="" method="post" class="login"> 
        <div class="usu">
            <div><label>Ususario</label><input name="user" type="text" ></div> 
            <div><label>Password</label><input name="password" type="password"></div> 
            <div><input name="login" type="submit" value="login"></div> 
            <div><a href="registro.php">Registrace</a></div>
        </div>
        <?php 
        if(!isset($_SESSION['userid'])) 
        { 

            if(isset($_POST['login'])) 
            { 
                if(verificar_login($_POST['user'],$_POST['password'],$result) == 1) 
                { 
                    $_SESSION['userid'] = $result->Id; 
                    $_SESSION['user'] = $result->Nombre; 
                    header("location:index.php"); 

                } 
                else 
                { 
                    echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; 
                } 
            } 
        } else { 
            echo 'Su usuario ingreso correctamente.'; 
            echo '<a href="logout.php">Logout</a>'; 
        } 
        ?>
        </form> 
    </body>
</html>