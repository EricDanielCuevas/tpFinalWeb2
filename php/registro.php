<?php
    require_once ("../Model/Conexion.php");
    $config = parse_ini_file("../Helpers/config.ini");
    $database = new Conexion($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hash = md5(time());

    $consulta = "INSERT INTO Usuario (nombre, apellido, telefono, email, clave, validar)
                    VALUES (?, ?, ?, ?, ?, ?)";
    $command = $database->prepare($consulta);
    $command->bind_param("ssssss", $nombre, $apellido, $telefono, $email, md5($password), $hash);
    $command->execute();

    $database->close();

    header("Location: validar.php?hash=" . $hash);
