<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use \App\Entity\Produto;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ../index.php?status=error');
    exit;
}

$objProduto = Produto::getProduto($_GET['id']);

if (!$objProduto instanceof Produto) {
    header('Location: ../index.php?status=error');
    exit;
}

if (isset($_POST['excluir'])) {

    $objProduto->excluirFoto($objProduto->foto);
    $objProduto->excluir($_GET['id']);

    header('Location: ../index.php?status=success');
    exit;
}