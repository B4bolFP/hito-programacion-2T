<?php
require_once '../clases/usuarios.php';

$u = new Usuario; // Inicializacion clase usuario
if (!empty($_POST['usuario']) AND !empty($_POST['password'])) { // miramos el formuilario esta vacio y si no lo esta continua
    
    $ip = $_SERVER['REMOTE_ADDR'];

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // sacamos el usuario con los datos del formulario
    $query = $u->getUser($usuario, $password);

    // guardamos la cantidad de lineas conseguidas con num_rows
    $query_rowCount = $query->num_rows;

    // si consigue mas de una linea continua
    if ($query_rowCount <> 0) {

        $userdata=mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $userdata['id']; // guardamos la sesion con el id

        // setteamos las cookies que necesitamos y en el header nos lleva a la siguiente pagina
        setcookie ("username",$usuario,time()+ 3600*24*7,"/");
        setcookie ("password",$password,time()+ 3600*24*7,"/");
        setcookie ("ip",$ip,time()+ 3600*24*7,"/");
        setcookie("ultimaVisita", date("F j, Y, g:i a"),time()+ 3600*24*7,"/");
        header("Location: ../vistas/entradas.php");
    } else {header("Location: ../vistas/login.php");}

} else {header("Location: ../vistas/login.php");}
?>