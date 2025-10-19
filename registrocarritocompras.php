<?php
session_start();

// Validar que venga del formulario de producto.php
if(!isset($_POST["submitCarrito"]) || !isset($_POST["idProducto"])){
    header("Location: panelprincipal.php");
    exit;
}

// Obtener id del producto enviado desde el formulario
$idProductoEnviado = trim($_POST["idProducto"]);

// Inicializar el carrito si no existe
if(!isset($_SESSION["carrito"])){
    $_SESSION["carrito"] = [];
}

// Buscar si el producto ya está en el carrito
$indice = null;
foreach($_SESSION["carrito"] as $indiceCarrito => $productoCarrito){
    if($productoCarrito['id'] == $idProductoEnviado){
        $indice = $indiceCarrito;
        break;
    }
}

// Buscar el producto en la lista de productos para obtener sus detalles
if($indice !== null) {
    $_SESSION["carrito"][$indice]["cantidad"] += 1;
}else{
    $nuevoProducto = ["id" => $idProductoEnviado, "cantidad" => 1];
    $_SESSION["carrito"][] = $nuevoProducto;
}

// Redirigir de vuelta a la página del producto o al carrito de compras
header("Location: producto.php?id=" . $idProductoEnviado);
exit;

?>