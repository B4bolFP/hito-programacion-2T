<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <title>Entradas</title>
</head>
<body>
    <div class="header-container-entradas">
        <div class="home-entradas">
            <a href="../index.html"><div class="header-menu-button">Home</div></a>
            <a href="nueva_entrada.html"><div class="header-menu-button">Generar nueva entrada</div></a>
        </div>
    </div>

    <div class="body-container">
        <h1>Hito individual, Programación</h1>
        <div class="body-section-container">
            <?php
                require_once '../clases/articulos.php';
                $a = new Articulo;

                $a->select()

            ?>
        </div>
    </div>

    <footer>Hito individual, Programación: Mario López Llamas</footer>
</body>
</html>