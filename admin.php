<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona de Administración</title>
</head>
<body>
    <h1>Bienvenido al Panel de Administración</h1>
    <p>Aquí puedes gestionar productos, pedidos y usuarios.</p>
    <a href="scripts/logout.php">Cerrar Sesión</a>
</body>
</html>
