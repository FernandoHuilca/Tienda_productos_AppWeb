<?php
session_start(); // SIEMPRE session_start()
$lang = isset($_COOKIE['lang']) ?  $_COOKIE['lang']  : 'es';
$path = 'Recursos/categorias_' . $lang . '.txt';
$_productos = file($path);
$idProductoABuscar = intval($_GET['id']);

foreach($_productos as $producto){
    $datosDelProducto = explode(",", $producto);
    if (intval($datosDelProducto[0]) == $idProductoABuscar) {
        $productoSeleccionado = [
            'id' => trim($datosDelProducto[0]),
            'nombre' => trim($datosDelProducto[1]),
            'descripcion' => trim($datosDelProducto[2]),
            'precio' => trim($datosDelProducto[3])
        ];
        break;
    }
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
    <!-- <h2>Bienvenido Usuario: <?php //echo $_SESSION['usuario']  ?> </h2> -->    
    <h2>Bienvenido Usuario: nombre_de_usuario </h2>
    <a href="panelprincipal.php">Panel Principal</a>
    <br>
    <a href="">Carrito de Compra</a>
    <br>
    <a href="index.php">Cerrar sesion</a>
    <br><br>
    <fieldset>
        <h1>Producto: <?php echo $productoSeleccionado['nombre']; ?></h1>
        <b>ID: </b><?php echo $productoSeleccionado['id']; ?>
        <br>
        <b>Descripcion: </b><?php echo $productoSeleccionado['descripcion']; ?>
        <br>
        <b>Precio: </b><?php echo $productoSeleccionado['precio']; ?>
        <br><br>
        <input type="button" value="Agregar al Carrito">
        <br><br>
    </fieldset>
</body>

</html>