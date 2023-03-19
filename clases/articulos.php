<?php
// Clase articulo esta clase se encarga de todas las funciones que afectan de cualquier forma a la tabla articulos.
class Articulo {
    private $link;

    public function __construct() {
        include_once 'conexion.php';
        $this->link = new Conexion;
    }

    public function select() { // Funcion para consultar la tabla articulos
        $sql = "SELECT `id`, `titulo`, `subtitulo`, `contenido` FROM `articulos`";
        $registros = $this->link->executeQuery($sql);

        // Este bucle saca todas las "Rows" de la tabla y las da formato para que sea legible en el navegador
        
        while($filas=mysqli_fetch_array($registros)){
            echo '<section>';
            echo '<h2>', $filas['titulo'],'</h2>';
            echo '<h3>', $filas['subtitulo'],'</h3>';
            echo '<p>', $filas['contenido'], '</p>';
            echo '<div class="section-menu">';
            echo '<a class="section-menu-button" href="editar.php?id='.$filas["id"].'" role="button">Editar</a>';
            echo '<a class="section-menu-button-borrar" href="../php/c_borrar.php?id='.$filas["id"].'" role="button">Borrar</a>';
            echo '</div>';
            echo '</section>';
        }
    }
    
    public function newArticulo($titulo, $subtitulo, $contenido) { // Añadir datos a la tabla
        $sql = "INSERT INTO `articulos` (`titulo`, `subtitulo`, `contenido`) VALUES ('$titulo', '$subtitulo', '$contenido');";
        $this->link->executeQuery($sql);
    }

    public function getRow_by_Id($id) { // obtener una fila for id en forma de array
        $sql = "SELECT `id`, `titulo`, `subtitulo`, `contenido` FROM `articulos` WHERE `articulos`.`id` = $id";

        $registros = $this->link->executeQuery($sql); 
        $row = mysqli_fetch_array($registros); // convierte la fila en un array

        return $row;
    }

    public function update_by_Id($id, $titulo, $subtitulo, $contenido) { // actualizar datos por id
        $sql = "UPDATE `articulos` SET `titulo` = '$titulo', `subtitulo` = '$subtitulo', `contenido` = '$contenido' WHERE `articulos`.`id` = $id;";

        $this->link->executeQuery($sql);
    }

    public function delete_by_Id($id) { // borrar fila por id
        $sql = "DELETE FROM articulos WHERE `articulos`.`id` = $id";
        
        $this->link->executeQuery($sql);
    }
}

?>