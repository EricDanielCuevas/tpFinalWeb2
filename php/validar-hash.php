<?php
    require_once ("../Model/Conexion.php");
    $config = parse_ini_file("../Helpers/config.ini");
    $database = new Conexion($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    $hash = $_GET["hash"];

    $consulta = "SELECT * FROM Usuario where validar=?";
    $command = $database->prepare($consulta);
    $command->bind_param("s",  $hash);
    $command->execute();

    $resultado = $command->get_result();

    if ($resultado->num_rows > 0) {
        $validar = "";
        $row = $resultado->fetch_assoc();
        $consulta =" UPDATE Usuario SET validar=? WHERE id=? ";
        $command = $database->prepare($consulta);
        $command->bind_param("ss",  $validar,$row["clave"]);
        $command->execute();
    }

    $database->close();

    header("Location: ../index.html");
