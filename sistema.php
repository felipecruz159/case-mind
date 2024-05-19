<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Entity\Produto;

// $usuario = new Usuario::getNome();
$produtos = Produto::getProdutos();

$result = '';


foreach($produtos as $produto){
    $produto->foto = $produto->mostraFoto($produto->foto);
    $result .= '<tr>
                    <td>'.$produto->id_produto.'</td>
                    <td>'.$produto->nome.'</td>
                    <td>'.$produto->quantidade.'</td>
                    <td>'.$produto->valor.'</td>
                    <td>'.$produto->descricao.'</td>
                    <td><img src="'.$produto->foto.'"></td>
                    <td class="text-center">
                    <div class="d-flex gap-1 justify-content-center">
                        <a href="balanço.php?id='.$produto->id_produto.'"><span class="btn btn-primary material-symbols-outlined" title="balanço">swap_vert</span></a>
                        <a href="edicao_produto.php?id='.$produto->id_produto.'"><span class="btn btn-primary material-symbols-outlined" title="editar">edit_square</span></a>
                        <a href="confirmar_exclusao.php?id='.$produto->id_produto.'" title="excluir"><span class="btn btn-danger material-symbols-outlined">delete</span></a>
                    </div>
                </td>';
}
?>

<main class="container mt-5 table-responsive mb-5" id="listagem">
    <div class="d-flex justify-content-between">
        <h2>Produtos</h2>
        <a href="cadastro_produtos.php"><button class="btn text-light">Cadastrar +</button></a>
    </div>
    <table class="table table-striped table-dark border mt-2 mb-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Qtd</th>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Foto</th>
                <th scope="col" colspan="3" class="text-center" style="width: 64px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?= $result ?>
        </tbody>
    </table>
</main>