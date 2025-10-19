<?php
session_start(); // SIEMPRE session_start()

// Control de acceso
if(!isset($_SESSION["usuario"]) && !isset($_SESSION["clave"])){
    header("Location: index.php");
}

// Cargar el producto seleccionado según el id pasado por GET
$lang = isset($_COOKIE['lang']) ?  $_COOKIE['lang']  : 'es';
$path = 'Recursos/categorias_' . $lang . '.txt';
$pathImagenes = 'Recursos/Imagenes/';
$_productos = file($path);
$idProductoABuscar = intval($_GET['id']);

// Buscar el producto en la lista de productos
foreach($_productos as $producto){
    $datosDelProducto = explode(",", $producto);
    if (intval($datosDelProducto[0]) == $idProductoABuscar) {
        $productoSeleccionado = [
            'id' => trim($datosDelProducto[0]),
            'nombre' => trim($datosDelProducto[1]),
            'descripcion' => trim($datosDelProducto[2]),
            'precio' => trim($datosDelProducto[3]),
        ];
        break;
    }
}

// Buscar si el producto ya está en el carrito para mostrar la cantidad seleccionada
$cantidadEnCarrito = 0;
if(isset($_SESSION["carrito"])){
    foreach($_SESSION["carrito"] as $item){
        if($item['id'] == $productoSeleccionado['id']){
            $cantidadEnCarrito = $item['cantidad'];
            break;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
     <h2>Bienvenido Usuario: <?php echo $_SESSION['usuario']  ?> </h2>     
    <!--<h2>Bienvenido Usuario: nombre_de_usuario </h2> -->
    <a href="panelprincipal.php">Panel Principal</a> <br>
    <br>
    <a href="carritocompras.php">Carrito de compra</a> <br>
    <br>
    <a href="cerrarsesion.php">Cerrar sesión</a>
    <br><br>
    <fieldset>
        <h1>Producto: <?php echo $productoSeleccionado['nombre']; ?></h1>
        <img src = "<?php echo $pathImagenes . $productoSeleccionado['id']; ?>.jpg" alt = "No eres tu, soy yo :(" height = 200 width = 200  >
        <br>
        <b>ID: </b><?php echo $productoSeleccionado['id']; ?>
        <br>
        <b>Descripcion: </b><?php echo $productoSeleccionado['descripcion']; ?>
        <br>
        <b>Precio: </b><?php echo $productoSeleccionado['precio']; ?>
        <br>
        <br>
        <b>Cantidad Seleccionada: <?php echo $cantidadEnCarrito; ?> </b> 
        <br><br>
        
        <!-- formulario para agregar al carrito. Si quieres que un botón haga que la sesión 
        guarde algo, debe estar entre etiqueta form, ser una etiqueta input, del tipo submit -->
        <form action="registrocarritocompras.php" method="post">
            <!-- Se envía el ID del producto a agregar al carrito -->
            <input type="hidden" name="idProducto" value="<?php echo $productoSeleccionado['id']; ?>">
            <input type="submit" name="submitCarrito" value="Agregar al Carrito" >
        </form>        

        <br><br>
    </fieldset>
</body>

</html>