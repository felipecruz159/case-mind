<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Produto
{

    /**
     * Id do produto
     * @var integer
     */
    public $id;

    /**
     * Nome do produto
     * @var string
     */
    public $nome;

    /**
     * Valor do produto
     * @var float
     */
    public $valor;

    /**
     * Quantidade do produto
     * @var integer
     */
    public $quantidade;

    /**
     * Descrição do produto
     * @var string
     */
    public $descricao;

    /**
     * Foto do produto
     * @var string
     */
    public $foto;

    public function cadastrar()
    {
        $objDatabase = new Database('produtos');
        $this->id = $objDatabase->insert([
            'nome' => $this->nome,
            'valor' => $this->valor,
            'quantidade' => $this->quantidade,
            'descricao' => $this->descricao,
            'foto' => $this->foto
        ]);

        return true;
    }

    public static function getProdutos($where = null, $order = null, $limit = null)
    {
        return (new Database('produtos'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Trata as fotos para envio no banco
     * @param array
     * @return string
     */
    public function trataFoto($foto = null, $produto)
    {
        $extensao = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $tipo = $foto['type'];
        $tmp  = $foto['tmp_name'];

        $typesPermitidos = ["image/png", "image/jpg", "image/jpeg"];
        if (!in_array($tipo, $typesPermitidos)) {
            echo '<p style="color: red;">Tipo de arquivo não permitido!</p>';
            echo '<meta http-equiv = "refresh" content = "1; url = ../cadastro_produtos.php" />'; 
            exit;
        }

        $pasta = 'C:\xampp\htdocs\mind\assets\images\products/';
        $hoje  = date("d-m-Y-h-i");
        $novoNome = $produto . '-' . $hoje;

        $caminho = $pasta . $novoNome . '.' . $extensao;
            
        if(move_uploaded_file($tmp, $caminho)){
            echo '<p style="color: green;">Produto cadastrado com sucesso!</p>';
        }
        else{
            echo '<p style="color: red;">Erro ao cadastrar o produto!</p>';
            echo '<meta http-equiv = "refresh" content = "1; url = ../cadastro_produtos.php" />'; 
            exit;
        }
        return $caminho;

    }
}