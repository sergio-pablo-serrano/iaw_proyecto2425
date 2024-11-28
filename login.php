<?php include 'includes/header.php'; ?>
<h2>Iniciar Sesión</h2>
<form action="scripts/login_user.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required><br>
    <button type="submit">Login</button>
</form>
<?php include 'includes/footer.php'; ?>
