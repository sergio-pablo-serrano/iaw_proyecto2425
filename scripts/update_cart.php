<?php
session_start();

// Verifica si el carrito está en la sesión
if (!isset($_SESSION['cart'])) {
    header('Location: ../carrito.php');
    exit();
}

$id_producto = $_GET['id'];
$action = $_GET['action'];

// Verifica si el producto está en el carrito
if (isset($_SESSION['cart'][$id_producto])) {
    if ($action == 'increase') {
        $_SESSION['cart'][$id_producto]['cantidad']++;
    } elseif ($action == 'decrease' && $_SESSION['cart'][$id_producto]['cantidad'] > 1) {
        $_SESSION['cart'][$id_producto]['cantidad']--;
    }
}

// Redirige al carrito actualizado
header('Location: ../carrito.php');
exit();
