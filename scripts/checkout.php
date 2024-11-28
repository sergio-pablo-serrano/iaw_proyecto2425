<?php
session_start();
include '../conexion.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Tu carrito está vacío. <a href='../index.php'>Volver a la tienda</a>";
    exit;
}

// Verifica si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    echo "Debes iniciar sesión para finalizar la compra. <a href='../login.php'>Iniciar sesión</a>";
    exit;
}

// Obtén el ID del usuario logueado
$id_usuario = $_SESSION['usuario'];

// Inserta el pedido en la base de datos
$sql_pedido = "INSERT INTO pedidos (id_cliente, fecha_creacion) VALUES (?, NOW())";
$stmt_pedido = $conn->prepare($sql_pedido);
$stmt_pedido->bind_param("i", $id_usuario);
$stmt_pedido->execute();
$id_pedido = $stmt_pedido->insert_id; // Obtiene el ID del pedido generado
$stmt_pedido->close();
// Vacía el carrito después de finalizar la compra
unset($_SESSION['cart']);

// Mensaje de confirmación
echo "<h2>Compra realizada con éxito</h2>";
echo "<p>Tu pedido ha sido procesado. Número de pedido: " . $id_pedido . "</p>";
echo "<a href='../index.php'>Volver a la tienda</a>";

$conn->close();
?>
