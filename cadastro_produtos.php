<?php
include_once 'includes/header.php';
?>

<div class="container mt-5" id="cadastro_produtos">
    <h1 class="text-center">Cadastro de Produtos</h1>
    <form action="includes/cadastrar_produto.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control">
        <label for="valor">Valor</label>
        <input type="number" name="valor" step="0.01" class="form-control">
        <label for="quantidade">Quantidade inicial</label>
        <input type="number" name="quantidade" class="form-control">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" cols="30" rows="5" class="form-control"></textarea>
        <label for="foto">Foto</label>
        <input type="file" name="foto" class="form-control-file">
        <input type="submit" class="btn text-light mt-3 mb-5" name="submit" value="Cadastrar">
    </form>
</div>

<?php
include_once 'includes/footer.php';
?>