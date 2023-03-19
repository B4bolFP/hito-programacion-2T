<?php
require_once '../clases/articulos.php';

$articulo = new Articulo;

$id = $_GET['id'];

$articulo->delete_by_Id($id);

header("Location: ../vistas/entradas.php");

?>