<?php

class Conexion{

    private $db;

    // Creo la base de datos en el constructor
    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);

        // En caso de que hayan datos inválidos la conexión a la base de datos lanzará un error
        if (!$this->db) {
            die("Ha ocurrido el error: " . mysqli_connect_error());
        }
    }

    public function __destruct(){
        mysqli_close($this->db);
    }

    // Obtener todos los usuarios de la db
    public function getUsers(){
        // Query que realiza la consulta seleccionando todos los usuarios
        $query = $this->db->query("SELECT * FROM Usuario");
        // Array vacio que guardara a todos los usuarios realizados en la consulta
        $arrayUsers = [];
        $i = 0;

        // Mientras haya una fila luego de realizar la consulta, se añadirá los usuarios a $arrayUsers y luego retorno
        while($fila = $query->fetch_assoc()){
            $arrayUsers[$i] = $fila;
            $i++;
        }
        return $arrayUsers;
    }

}

?>