<?php
session_start() // SIEMPRE session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Producto: aqui-va-el-nombre</h1> <!-- <?php echo $_SESSION["nombreProducto"]; ?> </h1> -->
    <h2>Descripcion: aqui-va-la-descripcion</h2> <!-- <?php echo $_SESSION["descripcionProducto"] ?> </h2> -->
    <h2>Precio: aqui-va-el-precio</h2>

    <p><a href="cerrarsesion.php"></a>Cerrar sesion</p>
</body>
</html>