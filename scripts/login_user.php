<?php
session_start();
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $contraseña = $conn->real_escape_string($_POST['contraseña']);

    // Consulta para obtener al usuario por email
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica la contraseña (en este caso sin hash)
        if ($contraseña === $user['contraseña']) {
            $_SESSION['usuario'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Verifica si es administrador
            if ($email === 'admin@comida.com') {
                $_SESSION['admin'] = true;
                header("Location: ../admin.php"); // Redirige al área de admin
            } else {
                $_SESSION['admin'] = false;
                header("Location: ../usuario.php"); // Redirige al área de usuario
            }
            exit;
        } else {
            echo "Contraseña incorrecta. <a href='../login.php'>Intentar de nuevo</a>";
        }
    } else {
        echo "Usuario no encontrado. <a href='../registro.php'>Regístrate aquí</a>";
    }

    $stmt->close();
}

$conn->close();
?>



