<?php
require_once '../clases/usuarios.php';

$u = new Usuario;
if (!empty($_POST['usuario']) AND !empty($_POST['password'])) {
    
    $ip = $_SERVER['REMOTE_ADDR'];

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    
    $query = $u->getUser($usuario, $password);

    $query_rowCount = $query->num_rows;

    if ($query_rowCount <> 0) {

        $userdata=mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $userdata['id'];
        setcookie ("username",$usuario,time()+ 3600*24*7,"/");
        setcookie ("password",$password,time()+ 3600*24*7,"/");
        setcookie ("ip",$ip,time()+ 3600*24*7,"/");
        setcookie("ultimaVisita", date("F j, Y, g:i a"),time()+ 3600*24*7,"/");
        header("Location: ../vistas/entradas.php");
    } else {header("Location: ../vistas/login.php");}

} else {header("Location: ../vistas/login.php");}
?>