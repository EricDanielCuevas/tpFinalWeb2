<?php

class Conexion{

    private $db;

    // Creo la base de datos en el constructor
    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

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

    public function querySession($consulta){
    // Ejecuto un query pasandole por parametro la base de datos y la consulta
        $resultado = mysqli_query($this->db, $consulta);

    // Obtengo el número de filas
        $filas = mysqli_num_rows($resultado);
    // Si obtengo un dato la sesion se inicia y pasa a la página seleccionPasaje.php sino imprime el echo
        if($filas>0){
            header("Location:seleccionPasaje.php");
        } else {
            echo 'Email o contraseña incorrectos';
        }
        return $resultado;
    }

    public function queryRegister($consulta){

        $command = $this->db->prepare($consulta);
        $command->bind_param("ssssss", $nombre, $apellido, $telefono, $email, md5($password), $hash);
        $command->execute();

        return $consulta;
    }

    public function queryValidarHash($consulta){
    $command = $this->db->prepare($consulta);
    $command->bind_param("s",  $hash);
    $command->execute();

    $resultado = $command->get_result();

    if ($resultado->num_rows > 0) {
        $validar = "";
        $row = $resultado->fetch_assoc();
        $consulta =" UPDATE Usuario SET validar=? WHERE id=? ";
        $command = $this->db->prepare($consulta);
        $command->bind_param("ss",  $validar,$row["clave"]);
        $command->execute();
      }
    return $consulta;
    }
}

?>