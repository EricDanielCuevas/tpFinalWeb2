<?php
    include_once "db.php";

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hash = md5(time());

    $consulta = "INSERT INTO Usuario (nombre, apellido, telefono, email, clave, validar)
                    VALUES (?, ?, ?, ?, ?, ?)";
    $command = $db->prepare($consulta);
    $command->bind_param("ssssss", $nombre, $apellido, $telefono, $email, md5($password), $hash);
    $command->execute();

    $db->close();

    header("Location: validar.php?hash=" . $hash);
