<?php
require dirname(__DIR__).'/vendor/autoload.php';

use \App\Entity\Usuario;

session_start();
if (isset($_POST['email']) && isset($_POST['senha'])){
    $objUsuario = new Usuario;    
    $objUsuario->email = $_POST['email'];
    $objUsuario->senha = md5($_POST['senha']);

    if($objUsuario->logar($objUsuario->email, $objUsuario->senha)){
        
        $_SESSION['email'] = $objUsuario->email;
        $_SESSION['senha'] = $objUsuario->senha;

        header('Location: ../index.php');
    } else{
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../login.php');
        exit;
    }
}