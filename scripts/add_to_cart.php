<?php
session_start();

// Verificar si el carrito ya está inicializado en la sesión
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Inicializa el carrito si no existe
}

// Suponiendo que pasas el ID del producto y el precio desde un formulario o enlace
$id_producto = $_GET['id']; // ID del producto que se está añadiendo
$cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : 1; // Cantidad, por defecto 1

// Verificar si el producto ya está en el carrito
if (isset($_SESSION['cart'][$id_producto])) {
    // Si ya existe en el carrito, sumamos la cantidad
    $_SESSION['cart'][$id_producto]['cantidad'] += $cantidad;
} else {
    // Si no existe, lo añadimos al carrito con la cantidad especificada
    // Aquí asumo que tienes una función para obtener los detalles del producto (nombre, precio, etc.)
    include '../conexion.php';
    $sql = "SELECT * FROM productos WHERE id = '$id_producto'";
    $result = $conn->query($sql);
    $producto = $result->fetch_assoc();

    $_SESSION['cart'][$id_producto] = array(
        'nombre' => $producto['nombre'],
        'precio' => $producto['precio'],
        'cantidad' => $cantidad
    );
}

// Redirige de vuelta a la página del carrito o donde quieras
header('Location: ../carrito.php');
exit();

