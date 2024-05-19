<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use \App\Entity\Usuario;


if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['senha2'])) {
    $objUsuario = new Usuario;
    $objUsuario->nome = $_POST['nome'];
    $objUsuario->email = $_POST['email'];
    if ($_POST['senha'] !== $_POST['senha2']) {
        echo '<p style="color: red;">As senhas se diferem!</p>';
        return;
    } else {
        $objUsuario->senha = md5($_POST['senha']);
        $objUsuario->cadastrar();
    }

    header('Location: ../index.php?status=success');
    exit;
}
