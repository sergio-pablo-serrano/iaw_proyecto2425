<?php
session_start();
session_unset();  // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión
header("Location: ../index.php");  // Redirige al inicio (puedes cambiar a otra página si es necesario)
exit;
?>
