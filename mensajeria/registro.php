<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lunion</title>
        <meta keywords="ejercicio HTML-CSS Mensajeria" description="Este es un ejercicio">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" href="css/style_registro.css">
    </head>
    <header>
    <?php

    session_start(); 
    include_once "includes/database.php"; 
                 
    ?> 
    <body>

    <form action="" method="post" class="registro"> 
        <div><label>Usuario:</label> 
        <input type="text" name="Nombre"></div> 
        <div><label>Password:</label> 
        <input type="password" name="password"></div> 
        <div><label>Repeat Password:</label> 
        <input type="password" name="repassword"></div> 
        <div><label>Imagen (URL):</label> 
        <input type="text" name="Imagen"></div> 
        <div> 
        <input type="submit" name="enviar" value="Registrar"></div> 
        <div><a href="login.php">Ingresar</a></div> 

                     
        <?php 
            if(isset($_POST['enviar'])) 
            { 
                if($_POST['Nombre'] == '' or $_POST['password'] == '' or $_POST['repassword'] == '') 
                { 
                    echo 'Por favor llene todos los campos.'; 
                } 
                else 
                { 
                    $sql = 'SELECT * FROM mensajes.usuarios'; 
                    $rec = mysql_query($sql); 
                    $verificar_usuario = 0; 
              
                    while($result = mysql_fetch_object($rec)) 
                    { 
                        if($result->Nombre == $_POST['Nombre']) 
                        { 
                            $verificar_usuario = 1; 
                        } 
                    } 
              
                    if($verificar_usuario == 0) 
                    { 
                        if($_POST['password'] == $_POST['repassword']) 
                        { 
                            $usuario = $_POST['Nombre']; 
                            $password = $_POST['password']; 
                            $url = $_POST['Imagen']; 
                            $sql = "INSERT INTO mensajes.usuarios (Nombre,password,URL) VALUES ('$usuario','$password','$url')"; 
                            mysql_query($sql); 
              
                            echo 'Usted se ha registrado correctamente.'; 
                            echo '<a href="login.php">Logout</a>';
                        } 
                        else 
                        { 
                            echo 'Las claves no son iguales, intente nuevamente.'; 
                        } 
                    } 
                    else 
                    { 
                        echo '<div class="error">Este usuario ya ha sido registrado anteriormente.</div>'; 
                    } 
                } 
            } 
        ?> 
    </form> 
</body>
</html>