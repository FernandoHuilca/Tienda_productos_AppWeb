<?php
session_start();
if(!isset($_SESSION["usuario"]) && !isset($_COOKIE["c_clave"])){
    header("Location: index.php");
}


$lang = isset($_COOKIE['lang']) ?  $_COOKIE['lang']  : 'es';
$title = $lang == 'es' ? 'Lista de Productos' : 'Product List';  
$path = 'Recursos/categorias_' . $lang . '.txt';
$_productos = file($path);
?>


<html>
    <head></head> 
    <body>
        <h1>PANEL PRINCIPAL</h1>
         <h2>Bienvenido Usuario: <?php echo $_SESSION['usuario']  ?></h2> 
        <!--<h2>Bienvenido Usuario: nombre_de_usuario </h2>-->
        <br>
        <a href="configuraridioma.php?lang=es">ES (Español) </a>
         | 
        <a href="configuraridioma.php?lang=en">EN (English) </a>
        <br>
        <br>
        <a href="carritocompras.php">Carrito de compra</a> <br>
        <br>
        <a href="cerrarsesion.php">Cerrar sesión</a>
        <br><br>

        <h3><?php echo $title ?></h3>

        <?php
        foreach($_productos as $producto){
            $datos = explode(",", $producto);
            echo '<p><a href="producto.php?id='. $datos[0] .'">'. $datos[1] .'</a></p>';
 
        }
        ?>
    </body>
</html>