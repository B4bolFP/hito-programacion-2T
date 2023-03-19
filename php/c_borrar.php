<?php
require_once '../clases/articulos.php';

$articulo = new Articulo; // Inicializacion clase articulo


// conseguimos el id de la url y se la pasamos a la funcion
$id = $_GET['id'];

$articulo->delete_by_Id($id);

header("Location: ../vistas/entradas.php"); // nos devuelve a la pagina en la que estabamos

?>