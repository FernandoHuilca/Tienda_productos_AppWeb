<?php

session_start(); // SIEMPRE session_start() al manejar sesiones

// Control de acceso
if(!isset($_SESSION["usuario"]) && !isset($_SESSION["clave"])){
    header("Location: index.php");
}

// Cargar los productos para mostrar los detalles del carrito y manejo del idioma
$lang = isset($_COOKIE['lang']) ?  $_COOKIE['lang']  : 'es';
$path = 'Recursos/categorias_' . $lang . '.txt';
$_productos = file($path);


$total = 0; // Inicializar total
$pathImagenes = 'Recursos/Imagenes/'; // Ruta de las imágenes

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CARRITO DE COMPRA</h1>
    <h2>Bienvenido Usuario: <?php echo $_SESSION["usuario"] ?> </h2>
    
    <br> <a href="panelprincipal.php">Panel principal</a> <br>
    <br> <a href="carritocompras.php">Carrito de compra</a> <br>
    <br> <a href="cerrarsesion.php">Cerrar sesión</a>
    
    <P>
        <?php
            // Mostrar los productos en el carrito tomando los detalles desde el archivo de productos
            if(isset($_SESSION["carrito"])){
                foreach($_productos as $producto){
                    $datosDelProducto = explode(",", $producto);

                    foreach($_SESSION["carrito"] as $productoCarrito ){
                        if(intval($datosDelProducto[0]) == $productoCarrito["id"]){
                            echo "<fieldset>";
                            echo "<b> Producto: " . $datosDelProducto[1] . "</b><br>";
                            echo '<img src = "' . $pathImagenes . $datosDelProducto[0] . '.jpg" alt = "No eres tu, soy yo :(" height = 200 width = 200  >' . "<br>";
                            echo "<b> ID: </b>" . $datosDelProducto[0] . "<br>";
                            echo "<b> Descripción: </b>" . $datosDelProducto[2] . "<br>";
                            echo "<b> Precio: </b>" . $datosDelProducto[3] . "<br>";
                            echo "<b> Cantidad: </b>" . $productoCarrito["cantidad"] . "<br>";
                            echo "</fieldset><br>   ";
                            $total = $total + ( (float)$datosDelProducto[3] * (float)$productoCarrito["cantidad"]);
                        }
                    }   
                }
                
                echo("<h3> TOTAL: $" . $total . " </h3> <br>");
                //array_splice($_SESSION["carrito"],0);
            }

            
        ?>
        
    </P>

</body>
</html>