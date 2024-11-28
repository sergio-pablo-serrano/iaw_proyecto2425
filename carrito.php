<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Tu carrito está vacío. <a href='index.php'>Volver a la tienda</a>";
    exit;
}

$total = 0;
?>

<?php include 'includes/header.php'; ?>

<h2>Tu Carrito de Compras</h2>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['cart'] as $id_producto => $producto): ?>
        <tr>
            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
            <td><?php echo $producto['cantidad']; ?></td>
            <td><?php echo number_format($producto['precio'], 2); ?> €</td>
            <td><?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?> €</td>
            <td>
                <a href="scripts/remove_from_cart.php?id=<?php echo $id_producto; ?>">Eliminar</a> |
                <a href="scripts/update_cart.php?id=<?php echo $id_producto; ?>&action=increase">Aumentar</a> |
                <a href="scripts/update_cart.php?id=<?php echo $id_producto; ?>&action=decrease">Disminuir</a>
            </td>
        </tr>
        <?php
            $total += $producto['precio'] * $producto['cantidad'];
        endforeach;
        ?>
    </tbody>
</table>

<h3>Total: <?php echo number_format($total, 2); ?> €</h3>

<a href="scripts/checkout.php">Finalizar Compra</a>

<?php include 'includes/footer.php'; ?>

