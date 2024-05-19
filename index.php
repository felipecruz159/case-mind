<?php
require __DIR__ . '/vendor/autoload.php';

session_start();
if (!isset($_SESSION['usuario'], $_SESSION['senha'])) {
    include_once __DIR__ . '/includes/header.php';
    $mensagem = '';
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;

            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
                break;
        }
    }
    echo $mensagem;
    include_once __DIR__ . '/sistema.php';
    include_once __DIR__ . '/includes/footer.php';
} else {
    include_once __DIR__ . '/login.php';
}
