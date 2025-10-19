<?php
session_start();
if(!isset($_SESSION["usuario"]) && !isset($_SESSION["clave"])){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Carrito de Compras</h1>

    <P>
        <?php
            $total = 0;
            if(isset($_SESSION["carrito"])){
                foreach($_SESSION["carrito"] as $producto ) : 
                    echo "ID: " . print_r($producto['id'], true) . "<br>";
                    echo "Nombre: " . print_r($producto['nombre'], true) . "<br>";
                    echo "Descripción: " . print_r($producto['descripcion'], true) . "<br>";
                    echo "Precio: " . print_r($producto['precio'], true) . "<br>";
                    echo "Cantidad: " . print_r($producto["cantidad"], true) . "<br>";
                    echo "<br>";
                    $total = $total + ( (float)$producto["precio"] * (float)$producto["cantidad"]);
                endforeach;
                echo("TOTAL: " . $total . "<br>");
                //array_splice($_SESSION["carrito"],0);
            }

            
        ?>
        
    </P>

    <a href="panelprincipal.php">Volver al panel principal</a> <br>
    <a href="carritocompas.php">Carrito de compra</a> <br>
    <a href="cerrarsesion.php">Cerrar sesión</a>

</body>
</html>