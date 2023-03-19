<?php

class Usuario {
    private $link;

    public function __construct() {
        include_once 'conexion.php';
        $this->link = new Conexion;
    }

    public function getUser($usuario, $password) {
        $sql = "SELECT * FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario' AND `usuarios`.`password` = '$password'";
        return $this->link->executeQuery($sql);
    }
}


?>