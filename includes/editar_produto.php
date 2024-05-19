<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use \App\Entity\Produto;


if (isset($_POST['nome'], $_POST['valor'], $_POST['descricao'])) {

    $objProduto = new Produto;
    $objProduto->nome = $_POST['nome'];
    $objProduto->valor = $_POST['valor'];
    $objProduto->quantidade = $_POST['quantidade'];
    $objProduto->descricao = $_POST['descricao'];
    $objProduto->foto = $objProduto->trataFoto($_FILES['foto'], $_POST['nome']);
    $objProduto->atualizar($_GET['id']);

    header('Location: ../index.php?status=success');
    exit;
}
