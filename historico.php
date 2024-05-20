<?php
require __DIR__ . '/vendor/autoload.php';
include_once 'includes/header.php';

use \App\Entity\Historico;

$transacoes = Historico::getHistorico();

$result = '';

foreach($transacoes as $transacao){
    $result .= '<tr>
                    <td>'.$transacao->id_transacao.'</td>
                    <td>'.$transacao->id_produto.'</td>
                    <td>'.$transacao->getNomeProduto().'</td>
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

<main class="container mt-5 table-responsive mb-5" id="historico">
    <div class="d-flex justify-content-between">
        <h2>Histórico de transações</h2>
    </div>
    <table class="table table-dark mt-2 mb-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id Produto</th>
                <th scope="col">Nome Produto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Saldo total</th>
                <th scope="col">Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?= $result ?>
        </tbody>
    </table>
</main>


<?php
include_once 'includes/footer.php';
?>