<?php
    // include_once "db.php";
require_once ("../Model/Conexion.php");
$config = parse_ini_file("../Helpers/config.ini");
$database = new Conexion($config["servername"], $config["username"], $config["password"], $config["dbname"], $config["port"]);
// Empiezo la sesión
session_start();

//Recibo por post el email y la contraseña y las guardo en las variables de sesion
$email = $_POST["email"];
$password = $_POST["psw"];
$_SESSION["email"] = $email;
$_SESSION["psw"] = $password;

$sessions = $database->querySession("SELECT * FROM Usuario WHERE email='$email'and clave = '$password'");
mysqli_free_result($sessions);






//// Creo la consulta
//$consulta = "SELECT * FROM Usuario WHERE email='$email'and clave = '$password'";
//// Ejecuto un query pasandole por parametro la base de datos y la consulta
//$resultado = mysqli_query($database, $consulta);
//
//// Obtengo el número de filas
//$filas = mysqli_num_rows($resultado);
//// Si obtengo un dato la sesion se inicia y pasa a la página seleccionPasaje.php sino imprime el echo
//if($filas>0){
//    header("Location:seleccionPasaje.php");
//} else {
//    echo 'Email o contraseña incorrectos';
//}
// Libera los resultados de la BD para no consumir espacio ni memoria

// Cierro la conexión de la BD
// mysqli_close($database);
?>