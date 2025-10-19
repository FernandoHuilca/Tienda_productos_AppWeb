<?php
session_start();
if(!isset($_SESSION["usuario"]) && !isset($_SESSION["clave"])){
    header("Location:index.php");
}

$lang = isset($_COOKIE['lang']) ?  $_COOKIE['lang']  : 'es';
$path = 'Recursos/categorias_' . $lang . '.txt';
$_productos = file($path);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <h2>Bienvenido Usuario: <?php echo $_SESSION["usuario"] ?> </h2>
    <P>
        <?php
            $total = 0;
            
            if(isset($_SESSION["carrito"])){
                foreach($_productos as $producto){
                    $datosDelProducto = explode(",", $producto);

                    foreach($_SESSION["carrito"] as $productoCarrito ){
                        if(intval($datosDelProducto[0]) == $productoCarrito["id"]){
                            echo "ID: " . $datosDelProducto[0] . "<br>";
                            echo "Nombre: " . $datosDelProducto[1] . "<br>";
                            echo "Descripción: " . $datosDelProducto[2] . "<br>";
                            echo "Precio: " . $datosDelProducto[3] . "<br>";
                            echo "Cantidad: " . $productoCarrito["cantidad"] . "<br>";
                            echo "<br>";
                            $total = $total + ( (float)$datosDelProducto[3] * (float)$productoCarrito["cantidad"]);
                        }
                    }   
                }

                
                echo("TOTAL: $" . $total . "<br>");
                //array_splice($_SESSION["carrito"],0);
            }

            
        ?>
        
    </P>

    <br>
    <a href="panelprincipal.php">Volver al panel principal</a> <br>
    <br>
    <a href="carritocompras.php">Carrito de compra</a> <br>
    <br>
    <a href="cerrarsesion.php">Cerrar sesión</a>

</body>
</html>