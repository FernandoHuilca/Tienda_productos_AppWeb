<?php
#Declaro las variables y les asigno "" para que si no se leen de la cookie el value del html no se llene 
$usuario = "";
$clave = ""; 

# si existe una cookie con los datos que quiero la leo si no mejor nop 

if (isset($_COOKIE["c_recordarme"]) && $_COOKIE["c_recordarme"] ){ # Si hay una cookie "recordarme" y luego si esta es true
    $usuario = $_COOKIE["c_usuario"];
    $clave = $_COOKIE["c_clave"];
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
</head>
    <body>
    <!--Titulo de la pagina -->
    <h1> Tienda de productos. </h1>

    <fieldset> 
        <legend>LOGIN</legend>
    <!--formulario enviado por post a acceso.php --> 
        <form action = "acceso.php" method = "POST"> 

            <label for = "user">Usuario: </label><br> 
            <!-- <input type = "Text" name = "usuario" value ="" id = "user" required> -->
            <input type = "Text" name = "usuario" id = "user" value = "<?php echo $usuario ?>"  required>
            <br> 


            <label for = "password">Clave: </label><br> 
            <!-- <input type = "password" name = "clave" id = "password" value = "" required> -->  
            <input type = "password" name = "clave" id = "password" value = "<?php echo $clave ?>" required>  
            <br> 

            <input type = "checkbox" name = "recordarme" id = "remenber">
            <label for = "recordarme">Recordar mis datos.</label>
            <br> 


            <input type = "submit" value = "Enviar"> 


        </form>
    </fieldset>



    </body>
</html>