<?php

// Fuentes
//http://www.taringa.net/posts/hazlo-tu-mismo/14629402/Tutorial-Crear-un-sistema-de-Login-con-PHP-y-MySQL.html
//http://www.taringa.net/posts/hazlo-tu-mismo/14629402/Tutorial-Crear-un-sistema-de-Login-con-PHP-y-MySQL.html
//http://www.taringa.net/posts/hazlo-tu-mismo/17512963/Sistema-de-registro-y-login-de-usuarios-html-php-mysql-tuto.html 
//https://www.youtube.com/watch?v=40K1xnYPURw
// creacion de un portal PHP y MSQL, Alfaomega Gripo Editor, Jacobo Pavon

session_start(); 
include_once "conexion.php"; 
             
?> 
<style type="text/css"> 
    *{ 
        font-size: 14px; 
    } 
    body{ 
    background:#aaa; 
    } 
    form.registro { 
        background: none repeat scroll 0 0 #F1F1F1; 
        border: 1px solid #DDDDDD; 
        font-family: sans-serif; 
        margin: 40 auto; 
        padding: 20px; 
        width: 278px; 
        box-shadow:0px 0px 20px black; 
        border-radius:10px; 
    } 
    form.registro div { 
        margin-bottom: 15px; 
        overflow: hidden; 
    } 
    form.registro div label { 
        display: block; 
        float: left; 
        line-height: 25px; 
    } 
    form.registro div input[type="text"], form.registro div input[type="password"] { 
        border: 1px solid #DCDCDC; 
        float: right; 
        padding: 4px; 
    } 
    form.registro div input[type="submit"] { 
        background: none repeat scroll 0 0 #DEDEDE; 
        border: 1px solid #C6C6C6; 
        float: right; 
        font-weight: bold; 
        padding: 4px 20px; 
    } 

        form.registro div input[type="Registrarce"] { 
        background: none repeat scroll 0 0 #DEDEDE; 
        border: 1px solid #C6C6C6; 
        float: right; 
        font-weight: bold; 
        padding: 4px 20px; 
    } 
    .error{ 
        color: black;  
        margin: 10px; 
        text-align: left; 
    } 
</style> 

<form action="" method="post" class="registro"> 
<div><label>Usuario:</label> 
<input type="text" name="usuario"></div> 
<div><label>Password:</label> 
<input type="password" name="password"></div> 
<div><label>Repeat Password:</label> 
<input type="password" name="repassword"></div> 
<div> 
<input type="submit" name="enviar" value="Registrar"></div> 
<div><a href="login.php">Ingresar</a></div> 

             
<?php 
if(isset($_POST['enviar'])) 
{ 
    if($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['repassword'] == '') 
    { 
        echo 'Por favor llene todos los campos.'; 
    } 
    else 
    { 
        $sql = 'SELECT * FROM usuarios'; 
        $rec = mysql_query($sql); 
        $verificar_usuario = 0; 
  
        while($result = mysql_fetch_object($rec)) 
        { 
            if($result->usuario == $_POST['usuario']) 
            { 
                $verificar_usuario = 1; 
            } 
        } 
  
        if($verificar_usuario == 0) 
        { 
            if($_POST['password'] == $_POST['repassword']) 
            { 
                $usuario = $_POST['usuario']; 
                $password = $_POST['password']; 
                $sql = "INSERT INTO usuarios (usuario,password) VALUES ('$usuario','$password')"; 
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
