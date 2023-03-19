<!DOCTYPE html>
<html lang="es">
<head>

    <link rel="stylesheet" href="../css/style_new_entrada.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar entrada</title>
</head>
<body>
    <div class="form-container">
        <h2>Actualizar entrada</h2>
        <form action="../php/c_editar.php" method="POST">

          <?php
            // obtenemos los campos de la base de datos y cambiamos el value por la sentencia php que contiene los datos de la bdd

            require_once '../clases/articulos.php';
            $articulo = new Articulo;

            $id = $_GET['id'];
            $row = $articulo->getRow_by_Id($id);

            echo '<input type="hidden" name="id" value="'.$id.'">';
            echo '<div class="input-container">';
            echo '<input type="text" name="titulo" placeholder="titulo" required value="'.$row['titulo'].'">';
            echo '</div>';
            echo '<div class="input-container">';
            echo '<input type="text" name="subtitulo" placeholder="Subtitulo" value="'.$row['subtitulo'].'">';
            echo '</div>';
            echo '<div class="input-container">';
            echo '<textarea name="contenido" cols="30" rows="10" placeholder="contenido" required>'.$row['contenido'].'</textarea>';
            echo '</div>';
            echo '<div class="botones">';
            echo '<input type="submit" value="Enviar" class="form-button">';
            echo '<a href="entradas.php"><input type="button" value="Volver" class="form-button"></a>';
            echo '</div>';
          ?>
        </form>
      </div>
</body>
</html>

