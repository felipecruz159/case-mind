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

    public function getNomeProduto($id_produto){
        return (new Database('historico'))->select('email = ' . $id_produto)
            ->fetchObject(self::class);
    }
}
