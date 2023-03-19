<?php
require_once '../clases/articulos.php';

$articulo = new Articulo;

$id = $_POST['id'];
$contenido = $_POST['contenido'];
$subtitulo = $_POST['subtitulo'];
$titulo = $_POST['titulo'];

$articulo->update_by_Id($id, $titulo, $subtitulo, $contenido);

header("Location: ../vistas/entradas.php");

?>