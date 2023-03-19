<!DOCTYPE html>
<html lang="es">
<head>

    <link rel="stylesheet" href="../css/styleForm.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>

    <?php 
      require '../clases/usuarios.php';
      $u = new Usuario;
      if (isset($_COOKIE['username']) AND isset($_COOKIE['password'])) {
        $usuario = $_COOKIE['username'];
        $pass = $_COOKIE['password'];

        $query = $u->getUser($usuario, $pass);

        $query_rowCount = $query->num_rows;

        if ($query_rowCount <> 0) {
          header('Location: entradas.php');
        }
      }
    ?>
    <div class="login-box">
        <h2>Login</h2>
        <form action="../php/c_login.php" method="POST">
          <div class="user-box">
            <input type="text" name="usuario" placeholder="Usuario" required>
          </div>
          <div class="user-box">
            <input type="password" name="password" placeholder="Contraseña" required>
          <input type="submit" name="submit" value="Entrar" class="form-button">
          <a href=".."><input type="button" value="Volver" class="form-button"></a>
        </form>
        
      </div>
</body>
</html>

