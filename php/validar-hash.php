<?php

    $hash = $_GET["hash"];

    $db = new mysqli("localhost", "root", "", "GauchoRocket");

    if ($db->connect_error) {
        die("Ha ocurrido el error: " . $db->connect_error);
    }

    $consulta = "SELECT * FROM Usuario where validar=?";
    $command = $db->prepare($consulta);
    $command->bind_param("s",  $hash);
    $command->execute();

    $resultado = $command->get_result();

    if ($resultado->num_rows > 0) {
        $validar = "";
        $row = $resultado->fetch_assoc();
        $consulta = "UPDATE Usuario SET validar=? WHERE id=?";
        $command = $db->prepare($consulta);
        $command->bind_param("ss",  $validar,$row["id"]);
        $command->execute();
    }

    $db->close();

    header("Location: ../index.html");
