<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use \App\Entity\Produto;
use \App\Entity\Historico;


echo "<pre>" . print_r($_POST) . "</pre>";
if (isset($_POST['tipo'], $_POST['movimento']) && isset($_GET['id'])) {

    $objHistorico = new Historico;
    $objHistorico->tipo = $_POST['tipo'];
    $objHistorico->movimento = $_POST['movimento'];
    $objHistorico->id_produto = $_GET['id'];
    $objHistorico->lancarEstoque();

    header('Location: ../index.php?status=success');
    exit;
}
