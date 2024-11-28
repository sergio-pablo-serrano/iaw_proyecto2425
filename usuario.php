<?php
session_start();
include 'conexion.php';

// Verifica si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige si no está logueado
    exit;
}

$id_usuario = $_SESSION['usuario'];

// Obtener información del usuario desde la base de datos (si lo necesitas)
$sql = "SELECT nombre, email FROM usuarios WHERE id = '$id_usuario'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Aquí puedes personalizar el saludo o lo que quieras mostrar al usuario
?>

<?php include 'includes/header.php'; ?>

<h2>Bienvenido, <?php echo htmlspecialchars($user['nombre']); ?></h2>
<p>Correo electrónico: <?php echo htmlspecialchars($user['email']); ?></p>

<a href="scripts/logout.php">Cerrar Sesión</a>

<?php include 'includes/footer.php'; ?>


