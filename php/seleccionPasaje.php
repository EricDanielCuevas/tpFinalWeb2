<?php
// Empiezo la sesión
session_start();
// Al llamar a una variable de sesión que no está definida genera error en la página
// por lo tanto utilizo error_reporting(0) para que no me notifique de ese error.
error_reporting(0);
// Guardo mi variable de sesión
$varsesion = $_SESSION["email"];
// Si mi variable de sesión es nula o vacía no se va a poder acceder a esta página
if($varsesion == null || $varsesion = ""){
    echo "Usted no tiene autorización";
    die(); // Finaliza la aplicación
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gauchoRocket/seleccionPasaje</title>
    <link rel="stylesheet" href="../css/seleccionPasaje.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/seleccionPasaje.js"></script>
</head>
<body class="w3-dark-grey">
    <div class="w3-top">
        <div class="w3-bar w3-black">
            <a href="#" class="w3-bar-item w3-button">Home</a>
            <a href="#" class="w3-bar-item w3-button">Nosotros</a>
            <a href="#" class="w3-bar-item w3-button">Mis Viajes</a>
            <a href="#" class="w3-bar-item w3-button">Turnos Medicos</a>
            <a href="cerrarSesion.php" class="w3-bar-item w3-right">Cerrar Sesión</a>
            <a class="w3-bar-item w3-right">Bienvenido: <?php echo $_SESSION['email'] ?></a>
            <a href="#" class="w3-bar-item w3-button w3-right" onclick="document.getElementById('id01').style.display='block'">Avatar</a>
        </div>
    </div>

    <div class="w3-container w3-padding-32 w3-margin w3-blue">
        <h5 class="w3-bold"><b>IMPORTANTE: TURNO MÉDICO</b></h5>
        <p>
            Para poder viajar debe tener el certificado médico que lo habilite. Puede reservar un turno en alguno de nuestros 3 centros médicos disponibles.<br> Recuerde que sin esto no podrá realizar ningún vuelo.
            <br><br>Muchas gracias.
        </p>
        <button class="w3-button w3-black w3-padding w3-right w3-margin-top">Reservar Turno</button>
    </div>

    <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="../imagenes/tour.jpeg">
          <div class="text">Tour por el universo</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="../imagenes/turismoespacial_espacio_viajerosespacio_virgin_galactic.jpg">
          <div class="text">Viaje a Neptuno</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="../imagenes/Turismo-Espacial-SAJ-1536x864.jpg">
          <div class="text">Viaje a destino</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div><br>

    <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    
    <div class="w3-padding-16 w3-container">
        <div class="w3-padding-16 w3-container">
            <div class="navbar ">
                <a href="#"><i class="fa fa-fw fa-search"></i> Buscar vuelo</a> 
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Check-in</a> 
                <a href="#"><i class="fa fa-fw fa-user"></i> Mi Reserva</a>
            </div>
            <div class="w3-container ">
                <form class="form-inline" action="">
                    <label for="origen">Origen:</label>
                    <input type="text" id="origen" placeholder="origen" name="origen">
                    <label for="destino">Destino:</label>
                    <input type="destino" id="destino" placeholder="destino" name="destino">
                    <label for="fecha">Fecha de partida</label>
                    <input type="text" id="fecha" placeholder="fecha" name="fecha">
                    <p>Selecione servicio :</p>
                    <label>
                      <input type="checkbox" name="general"> General
                    </label>
                    <label>
                        <input type="checkbox" name="familiar"> Familiar
                      </label>
                      <label>
                        <input type="checkbox" name="suite"> Suite
                      </label>
                    <button type="submit">Buscar Vuelo</button>
                  </form>
            </div>
        </div>
        
    </div>
    

    <footer class="w3-dark-grey">
        <div class="w3-row w3-container w3-padding-24 ">
            <div class="w3-container w3-padding-32 w3-center w3-dark-grey-d2 w3-text-light-grey">
                <h5 style="color: #cccccc">Gaucho Rocket S.A.</h5>
                <p>
                    <i class="material-icons w3-margin-right" aria-hidden="true">place</i>
                    Florencio Varela 1903 (B1754JEC)
                </p>
                <p>
                    <i class="material-icons w3-margin-right" aria-hidden="true">place</i>
                    San Justo, Buenos Aires, Argentina
                </p>
                <p>
                  <i class="material-icons w3-margin-right" aria-hidden="true">phone</i>
                    <a href="tel:+5411 4480-8900">(+54 11) 4480-8900</a>
                </p>
                <p>
                    <i class="material-icons w3-margin-right" aria-hidden="true">link</i>
                    <a href="https://www.unlam.edu.ar">www.unlam.edu.ar</a>
                </p>
                <p class="redes">
                    <a target="_blank" href="https://www.facebook.com/UnlamOficial">
                        <img src="https://miel.unlam.edu.ar/vista/imagenes/home/icono-facebook-32.png" alt="facebook unlam"></a>
                    <a target="_blank" href="https://twitter.com/UnlamOficial">
                        <img src="https://miel.unlam.edu.ar/vista/imagenes/home/icono-twitter-32.png" alt="twitter unlam"></a>
                    <a target="_blank" href="https://www.instagram.com/unlamoficial">
                        <img src="https://miel.unlam.edu.ar/vista/imagenes/home/icono-instagram-32.png" alt="instagram unlam"></a>
                </p>
            </div>
    
        </div>
    
        <div class="w3-container w3-padding-32 w3-center w3-dark-grey-d2 w3-text-light-grey">
            Gaucho Rocket S.A. - Departamento de Ingeniería e Investigaciones Tecnológicas - 2021<br>
            <a href="mailto:GauchoRocket@unlam.edu.ar">GauchoRocket@unlam.edu.ar</a><br>
        </div>
    
    </footer> 
</body>
</html>
