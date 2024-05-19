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

<div class="container mt-5" id="edicao_produto">
    <h1 class="text-center">Editar produto</h1>
    <form action="includes/editar_produto.php?id=<?= $_GET['id']?>" method="POST" enctype="multipart/form-data" class="d-flex flex-column">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" value="<?= $objProduto->nome ?>">
        <label for="valor">Valor</label>
        <input type="number" name="valor" step="0.01" class="form-control" value="<?= $objProduto->valor ?>">
        <label for="quantidade">Quantidade inicial</label>
        <input type="number" name="quantidade" class="form-control" value="<?= $objProduto->quantidade ?>" readonly>
        <label for="descricao">Descrição</label>
        <textarea name="descricao" cols="30" rows="5" class="form-control"><?= $objProduto->descricao ?></textarea>
        <div class="container-fluid d-flex justify-content-between mt-1" id="fotos">
            <label for="foto">Foto</label>
            
            <a href="
            <?php
                if($objProduto->foto !== null){
                    echo $objProduto->validaFotoLink($objProduto->foto);
                } else {
                    echo '#';
                } ?>"
                target="_blank">
            <?php 
                if($objProduto->foto !== null){
                    echo 'Ver a foto atual';
                } else { 
                    echo 'Produto sem foto';
                }?></a>
        </div>
        <input type="file" name="foto" class="form-control-file">
        <input type="submit" class="btn text-light mt-3 mb-5" name="submit" value="Editar">
    </form>
</div>

<?php
include_once 'includes/footer.php';
?>