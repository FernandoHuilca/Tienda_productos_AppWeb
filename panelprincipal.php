<?php
session_start();
$lang = isset($_COOKIE['lang']) ?  $_COOKIE['lang']  : 'es';
$title = $lang == 'es' ? 'Lista de Productos' : 'Product List';  
$path = 'Recursos/categorias_' . $lang . '.txt';
$_productos = file($path);
?>


<html>
    <head></head> 
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <!-- <h2>Bienvenido Usuario: <?php //echo $_SESSION['usuario']  ?> </h2> -->
        <h2>Bienvenido Usuario: nombre_de_usuario </h2>
        <br>
        <a href="configuraridioma.php?lang=es">ES (Español) </a>
         | 
        <a href="configuraridioma.php?lang=en">EN (English) </a>
        <br>
        <br>
        <a href=""> Cerrar Sesion </a>

        <h3><?php echo $title ?></h3>

        <?php
        foreach($_productos as $producto){
            $datos = explode(",", $producto);
            echo '<p><a href="producto.php?id='.intval($datos[0]).'">'.htmlspecialchars($datos[1]).'</a></p>';


            // Revisar orden de elementos id del producto, nombre, descripcion, precio
            //if (count($datos) >= 2) {
            //  $id = trim($datos[0]);       
            //  $nombre = trim($datos[1]);   
            //  echo '<p><a href="producto.php?id=' . intval($id) . '">' . htmlspecialchars($nombre) . '</a></p>';
        }
        ?>
    </body>
</html>