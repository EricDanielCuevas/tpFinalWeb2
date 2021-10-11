<?php
    $db = new mysqli("localhost", "root", "root", "GauchoRocket",3306);

    if ($db->connect_error) {
        die("Ha ocurrido el error: " . $db->connect_error);
    }
