<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['carrito'])) {
    $id_producto = intval($_GET['id']);
    $_SESSION['carrito'] = array_diff($_SESSION['carrito'], [$id_producto]);
}

header("Location: ../carrito.php");
?>
