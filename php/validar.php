<?php

$hash = $_GET['hash'];

echo "<!DOCTYPE html>
<html>
   <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=3'>
        <meta name='description' content=''>
        <title> Gaucho Rocket S.A. </title>
        <link rel='stylesheet' href='css/contacto.css'>
        <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
      </head>

    <body>
       <header class= 'header'>
            <div class='w3-top'>
                <div class='w3-bar w3-black'>
                    <a href='#' class='w3-bar-item w3-button'>Home</a>
                    <a href='#' class='w3-bar-item w3-button w3-right' onclick='document.getElementById('id01').style.display='block''>Iniciar Sesión</a>
                </div>
            </div>
        </header>
        <main>
            <div class='w3-center'>
                <img src='imagenes/img-confirm-email.jpeg' alt='confirm email'>
                <h3>¡Tu cuenta se registró exitosamente!</h3>
                <h5>Para completar el registro por favor confirma tu email</h5>
                <a href='validar-hash.php?hash=$hash'>
                    <button class='w3-button w3-padding w3-section w3-black w3-ripple w3-padding'>Validar</button>
                </a>
            </div>
        </main>
    </body>
</html>";
?>