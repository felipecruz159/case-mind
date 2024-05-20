<?php
require __DIR__ . '/vendor/autoload.php';
include_once 'includes/header.php';

use \App\Entity\Historico;
use \App\Entity\Produto;

$transacoes = Historico::getHistorico();

$result = '';

foreach($transacoes as $transacao){
$objProduto = Produto::getProduto($transacao->id_produto);
    $result .= '<tr id="movimentacoes">
                    <td class="'.$transacao->tipo.'">'.$transacao->id_transacao.'</td>
                    <td class="'.$transacao->tipo.'">'.$transacao->id_produto.'</td>
                    <td class="'.$transacao->tipo.'">'.$objProduto->nome.'</td>
                    <td class="'.$transacao->tipo.'">'.$transacao->tipo.'</td>
                    <td class="'.$transacao->tipo.'">'.$transacao->movimento.'</td>';
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