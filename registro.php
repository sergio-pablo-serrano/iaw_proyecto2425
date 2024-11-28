<?php include 'includes/header.php'; ?>
<h2>Registro de Usuarios</h2>
<form action="scripts/register_user.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required><br>
    <button type="submit">Registrar</button>
</form>
<?php include 'includes/footer.php'; ?>
