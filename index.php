<?php include 'includes/header.php'; ?>
<h2>Productos Disponibles</h2>
<?php
include 'conexion.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Imagen</th><th>Acción</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['descripcion'] . "</td>";
        echo "<td>" . $row['precio'] . "€</td>";
        echo "<td><img src='" . $row['imagen'] . "' alt='" . $row['nombre'] . "' style='width:50px;'></td>";
        echo "<td><a href='scripts/add_to_cart.php?id=" . $row['id'] . "'>Añadir al carrito</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay productos disponibles.</p>";
}

$conn->close();
?>
<?php include 'includes/footer.php'; ?>
