<?php
// Empiezo la sesión
session_start();
// Destruyo la sesión
session_destroy();
// Redirecciono a la página index.html al cerrar sesión
header("Location: ../index.html");

?>