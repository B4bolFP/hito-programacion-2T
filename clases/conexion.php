<?php

// Clase conexion, es la encargada de establecer la conexion con la base de datos

class Conexion {
    // Variables privadas que van a ser usadas a lo largo de la clase si fuese necesario.
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $bdd = "hitobdd";
    private $link;

    public function __construct() { // El constructor establece conexion, si no lo consigue nos dira que la conexion en concreto da fallo
        $this->link = new mysqli($this->host, $this->usuario, $this->password, $this->bdd);
        if ($this->link->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $this->link->connect_errno . ") " . $this->link->connect_error;
        }
        return $this->link;
    }

    // Esta funcion si le proporcionamos una sentencia coherente de SQL se la enviara a la BDD para que sea ejecutada
    public function executeQuery($sql) {
        $resultado = mysqli_query($this->link, $sql);
        return $resultado; // Devuelve los resultados para poder ser usados en otras cosas
    }

    // Funcion para terminar la conexion con la base de datos.
    public function close() {
        mysqli_close($this->link);
      }
}
?>
