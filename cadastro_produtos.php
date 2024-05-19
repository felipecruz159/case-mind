<?php
include_once 'includes/header.php';
?>

<div class="container mt-3" id="cadastro_produtos">
    <h1 class="text-center">Cadastro de Produtos</h1>
    <form action="" method="POST" class="d-flex flex-column">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control">
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" class="form-control">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" cols="30" rows="5" class="form-control"></textarea>
        <input type="submit" class="btn text-light mt-3" name="submit" value="Cadastrar">
    </form>
</div>

<?php
include_once 'includes/footer.php';
?>