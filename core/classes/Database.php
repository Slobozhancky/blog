<?php

namespace Core\Classes;

use PDO;
use PDOException;
use PDOStatement;

class Database {
    private $connection;
    private $statement;
    private static $instance = null;

    private function __construct()
    {  
    }

    private function __clone()
    {
        
    }

    public function __wakeup()
    {
        
    }

    public static function getInstance() {
        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(array $db_config)
    {
        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['database']};charset={$db_config['charset']}";

        try {
            $this->connection = new PDO($dsn, $db_config['login'], $db_config['password'], $db_config['options']);
            return $this;
        } catch (PDOException $e) {
            aboard(500);
        }
    }

    public function query ($query, $params = []) {

        try {
            $this->statement = $this->connection->prepare($query);
            $this->statement->execute($params);
        } catch (PDOException $error) {
            d($error->getMessage());
            return false;
        }
        
        return $this;
    }

    public function findAll(){
        return $this->statement->fetchAll();
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){

        $res = $this->find();

        if(!$res){
            aboard(404);
        }

        return $res;
    }


}