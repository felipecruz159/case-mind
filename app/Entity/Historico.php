<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Historico
{

    /**
     * Id do historico
     * @var integer
     */
    public $id;

    /**
     * Id do produto
     * @var integer
     */
    public $id_produto;

    /**
     * Tipo da transação
     * @var string (entrada/saída)
     */
    public $tipo;

    /**
     * Quantidade movimentada
     * @var integer
     */
    public $movimento;
    
    public static function getHistorico($where = null, $order = null, $limit = null)
    {
        return (new Database('historico'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Lança estoque em produtos e histórico de movimentações
     */
    public function lancarEstoque(){
        $dbHistorico = new Database('historico');
        $dbProdutos = new Database('produtos');

        $produto = Produto::getProduto($this->id_produto);
        // echo 'idproduto:'.$this->id_produto;
        // echo 'tipo:'.$this->tipo;
        // echo $produto->quantidade;
        if($this->tipo === 'entrada'){
            $produto->quantidade += $this->movimento;
        } else{
            $produto->quantidade -= $this->movimento;
        }
        $produto->atualizar($this->id_produto);

        $dbHistorico->insert([
            'id_produto' => $this->id_produto,
            'tipo' => $this->tipo,
            'movimento' => $this->movimento
        ]);
    }
}
