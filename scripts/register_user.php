<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $contraseña = $conn->real_escape_string($_POST['contraseña']); // Contraseña en texto plano

    // Consulta para verificar si el email ya está registrado
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "El email ya está registrado. <a href='../registro.php'>Intenta de nuevo</a>";
    } else {
        // Inserta el nuevo usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $contraseña); // Contraseña almacenada directamente
        if ($stmt->execute()) {
            echo "Usuario registrado correctamente. <a href='../login.php'>Inicia sesión aquí</a>";
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
