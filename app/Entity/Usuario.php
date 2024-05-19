<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario{

    /**
     * Id do Usuário
     * @var integer
     */
    public $id;

    /**
     * Nome do Usuário
     * @var string
     */
    public $nome;

    /**
     * Email do Usuário
     * @var string
     */
    public $email;

    /**
     * Senha do Usuário
     * @var string
     */
    public $senha;

    /**
     * Cadastrar novo usuário
     * @return boolean
     */
    public function cadastrar(){
        $objDatabase = new Database('login');
        $this->id = $objDatabase->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha
        ]);
        
        return true;
    }

    /**
     * Login do usuário
     * @param string $email
     * @param string $senha
     * @return boolean
     */
    public function logar($email, $senha){
        return (new Database('login'))->select('email = ' . '"' . $email . '"' . ' AND ' . 'senha = ' . '"' .$senha . '"')
            ->fetchObject(self::class);
    }
}