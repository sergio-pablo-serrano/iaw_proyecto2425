<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comida Rápida</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Tienda de Comida Rápida</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="carrito.php">Carrito</a>
        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="usuario.php">Mi Cuenta</a>
            <a href="scripts/logout.php">Cerrar Sesión</a>
        <?php else: ?>
            <a href="login.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
        <?php endif; ?>
    </nav>
</header>
<main>

