<?php
require_once '../clases/articulos.php';

$articulo = new Articulo;

$contenido = $_POST['contenido'];
$subtitulo = $_POST['subtitulo'];
$titulo = $_POST['titulo'];

$articulo->newArticulo($titulo, $subtitulo, $contenido);

header("Location: ../vistas/entradas.php");

?>