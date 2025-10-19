<?php
    session_start();
    
    if(!isset($_SESSION["usuario"]) && !isset($_COOKIE["c_clave"])){
        header("Location: index.php");
    }

    $_productos = $_SESSION['productos']; // Recuperar los productos almacenados en la sesión.
    $idProductoABuscar = intval($_GET['id']); // Obtener el ID del producto que el usuario selecionó para visualizar.

    foreach($_productos as $producto){
        $datosDelProducto = explode(",", $producto);
        if (intval($datosDelProducto[0]) == $idProductoABuscar) { // Comparar con el ID del producto seleccionado con la lista de productos para obtener toda la información.
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

<html>
    <head>
    </head>

    <body>
        <h2>Bienvenido Usuario: <?php echo $_SESSION['usuario']  ?> </h2>     
        <a href="panelprincipal.php">Panel Principal</a>
        <br>
        <a href="">Carrito de Compra</a>
        <br>
        <a href="cerrarsesion.php">Cerrar sesion</a>
        <br><br>
        <fieldset>
            <h1>Producto: <?php echo $productoSeleccionado['nombre']; ?></h1>
            <b>ID: </b><?php echo $productoSeleccionado['id']; ?>
            <br>
            <b>Descripcion: </b><?php echo $productoSeleccionado['descripcion']; ?>
            <br>
            <b>Precio: </b><?php echo "$" . $productoSeleccionado['precio']; ?>
            <br><br>
            <input type="button" value="Agregar al Carrito">
            <br><br>
        </fieldset>
    </body>
</html>