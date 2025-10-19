<?php
session_start(); // SIEMPRE session_start()
if(!isset($_SESSION["usuario"]) && !isset($_SESSION["clave"])){
    header("Location: index.php");
}

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
            'precio' => trim($datosDelProducto[3]),
        ];
        break;
    }
}

$indice = null;
foreach($_SESSION["carrito"] as $i => $item){
    if($item['id'] == $productoSeleccionado['id']){
        $indice = $i;
        break;
    }
}

// Si se envió el formulario para agregar al carrito, lo que hacemos es agregar el producto a la sesión
// a través de un array llamado "carrito" (Le damos un nombre para saber cómo acceder a él después). 
// Nota: Para AGREGAR elementos usamos array[] = valor. Pero, la forma de acceder a los elementos
// del carrito es a través de $_SESSION["carrito"][índice].
if(isset($_POST["submitCarrito"])){
    if(!isset($_SESSION["carrito"])){
        $_SESSION["carrito"] = [];
    }

    if($indice !== null) {
        $_SESSION["carrito"][$indice]["cantidad"] += 1;
    }else{
        $nuevoProducto = $productoSeleccionado["id"];
        $nuevoProducto["cantidad"] = 1; 
        $_SESSION["carrito"][] = $nuevoProducto;
    }

    //echo "Carrito: " . print_r($_SESSION["carrito"], true) . "<br>";
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
    <a href="panelprincipal.php">Panel Principal</a>
    <br>
    <a href="carritocompras.php">Carrito de Compra</a>
    <br>
    <a href="cerrarsesion.php">Cerrar sesion</a>
    <br><br>
    <fieldset>
        <h1>Producto: <?php echo $productoSeleccionado['nombre']; ?></h1>
        <b>ID: </b><?php echo $productoSeleccionado['id']; ?>
        <br>
        <b>Descripcion: </b><?php echo $productoSeleccionado['descripcion']; ?>
        <br>
        <b>Precio: </b><?php echo $productoSeleccionado['precio']; ?>
        <br>
        <br>
        <b>Cantidad Seleccionada: <?php echo $_SESSION["carrito"][$indice]["cantidad"] ?> </b> 
        <br><br>
        <!-- formulario para agregar al carrito. Si quieres que un botón haga que la sesión 
        guarde algo, debe estar entre etiqueta form, ser una etiqueta input, del tipo submit -->
        <form method="post">
            <input type="submit" name="submitCarrito" value="Agregar al Carrito" >
        </form>        
        <br><br>
    </fieldset>
</body>

</html>