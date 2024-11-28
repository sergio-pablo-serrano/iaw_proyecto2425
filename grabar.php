<?php

// Con isset solo compruebo que el dato este definido
// Con empty valoro que este definido y que no este vacio
if(!empty($_REQUEST["nombre"]) && !empty($_REQUEST["puntos"])){
    // Recuperar valores enviados por el usuario
    $nombre = $_REQUEST["nombre"];
    $puntos = $_REQUEST["puntos"];

    if($puntos < 0 || strlen($nombre) != 3){
        // Los puntos negativos dan error
        $msg = "Nombre o puntos incorrectos";
    }else{
        // Doy formato al nombre
        $nombre = strtoupper($nombre);

        // Me conecto a la BBDD
        $conn = new mysqli("localhost", "root", "", "examen_2018");

        // Construyo la SQL a ejecutar
        $sql = "INSERT INTO jugadores (nombre, puntos, fecha) VALUES ('$nombre',$puntos,now())";
        
        // ejecuto la consulta
        $conn->query($sql);

        // Cierro la conexión
        $conn->close();

        // No da error
        //echo "Te llamas $nombre y tienes $puntos puntos";
        $msg = "Se ha grabado al usuario $nombre con $puntos puntos.";
    }
    
}else{
    $msg = "Error en los parametros.";
}
session_start();
$_SESSION["msg"] = $msg;
Header("Location: index.php");
?>