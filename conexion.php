<?php
$servername = "localhost";
$username = "root"; // Cambiar si tienes un usuario diferente
$password = "";
$dbname = "comida_rapida"; // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
