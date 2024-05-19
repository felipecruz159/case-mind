<?php
require __DIR__ . '/vendor/autoload.php';
include_once 'includes/header.php';

use \App\Entity\Produto;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
    exit;
}

$objProduto = Produto::getProduto($_GET['id']);

if (!$objProduto instanceof Produto) {
    header('Location: index.php?status=error');
    exit;
}
?>

<div class="container text-center" id="exclusao_produto">
    <form action="includes/excluir_produto.php?id=<?= $_GET['id']?>" method="POST" class="d-flex flex-column mt-3">
        <h5>Deseja realmente excluir o produto <strong><?=$objProduto->nome?>?</strong></h5>
        <div class="container d-flex justify-content-around" id="deletar">
            <a href="index.php" class="btn btn-success">Cancelar</a>
            <button type="submit" name="excluir" class="btn btn-danger" value="Excluir">Excluir</button>
        </div>
    </form>
</div>

<?php
include_once 'includes/footer.php';
?>