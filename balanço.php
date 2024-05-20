<?php
require __DIR__ . '/vendor/autoload.php';
include_once 'includes/header.php';

use \App\Entity\Produto;
use \App\Entity\Historico;

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

<div class="container mt-5" id="edicao_produto">
    <h1 class="text-center">Inserir transação</h1>
    <form action="includes/inserir_transacao.php?id=<?= $_GET['id'] ?>" method="POST" class="d-flex flex-column">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" value="<?= $objProduto->nome ?>" readonly>
        <label for="quantidade">Quantidade em Estoque</label>
        <input type="number" name="quantidade" class="form-control" value="<?= $objProduto->quantidade ?>" readonly>
        <div class="d-flex gap-3 justify-content-between">
            <div>
                <label for="tipo">Tipo de movimentação</label>
                <select name="tipo" id="" class="form-control">
                    <option value="saida" selected>Saída</option>
                    <option value="entrada">Entrada</option>
                </select>
            </div>
            <div>
                <label for="movimento">Quantidade movimentada</label>
                <input type="number" class="form-control" name="movimento">
            </div>
        </div>

        <input type="submit" class="btn text-light mt-3 mb-5" name="submit" value="Inserir">
    </form>
</div>

<?php
include_once 'includes/footer.php';
?>