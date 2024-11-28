<?php

    $idrecibido = $_REQUEST["id"];

    // conecto a la bbdd
    $conn = new mysqli("localhost", "root", "", "examen_2018");

    /// creo la consultar
    $sql = "DELETE FROM jugadores WHERE id = $idrecibido";

    //ejecuto
    $conn->query($sql);

    // Cierro conexion
    $conn->close();

    // redirigo con mensaje a index
    session_start();
    $_SESSION["msg"] = "Se ha borrado al usuario con id $idrecibido";
    Header("Location: index.php");
?>