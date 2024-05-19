<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database
{

    /**
     * HOST do banco de dados
     * @var string
     */
    const HOST = "localhost";

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = "case_mind";

    /**
     * Usuário do banco de dados
     * @var string
     */
    const USER = "root";

    /**
     * Senha do banco de dados
     * @var string
     */
    const PASS = "";

    /**
     * Nome da tabela
     * @var string
     */
    private $table;

    /**
     * Instancia de conexão
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Criar conexão com o banco de dados
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * Executa as queries dentro do banco
     * @param string $query
     * @param array @params
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * Inserir dados no banco
     * @param array $values
     * @return integer id
     */
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    /**
     * Realizar consulta no banco
     * @param string $where
     * @param string $order
     * @param string $limit 
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = "*")
    {

        $where = !empty($where) ? 'WHERE ' . $where : '';
        $order = !empty($order) ? 'ORDER BY ' . $order : '';
        $limit = !empty($limit) ? 'LIMIT ' . $limit : '';

        $query = "SELECT " . $fields . " FROM " . $this->table . " " . $where . " " . $order . " " . $limit;

        return $this->execute($query);
    }

    /**
     * Atualizar o banco de dados
     * @param string $where
     * @param array $values
     * @return boolean
     */
    public function update($where, $values)
    {
        $fields = array_keys($values);

        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
        
        echo $query;

        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * Excluir dados do banco de dados
     * @param string $where
     * @return boolean
     */
    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
    }
}
