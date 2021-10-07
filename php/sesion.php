<?php
// Empiezo la sesión
session_start();

//Recibo por post el email y la contraseña y las guardo en las variables de sesion
$email = $_POST["email"];
$password = $_POST["psw"];
$_SESSION["email"] = $email;
$_SESSION["psw"] = $password;

// Conecto a la BD
$db = new mysqli("localhost", "root", "", "GauchoRocket");
// Creo la consulta
$consulta = "SELECT * FROM Usuario WHERE email='$email'and clave = '$password'";
// Ejecuto un query pasandole por parametro la base de datos y la consulta
$resultado = mysqli_query($db, $consulta);

// Obtengo el número de filas
$filas = mysqli_num_rows($resultado);
// Si obtengo un dato la sesion se inicia y pasa a la página seleccionPasaje.php sino imprime el echo
if($filas>0){
    header("Location:seleccionPasaje.php");
} else {
    echo 'Email o contraseña incorrectos';
}
// Libera los resultados de la BD para no consumir espacio ni memoria
mysqli_free_result($resultado);
// Cierro la conexión de la BD
mysqli_close($db);