<?php

class Database {
    private $connection;
    private $statement;

    public function __construct(array $db_config)
    {
        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['database']};charset={$db_config['charset']}";

        try {
            $this->connection = new PDO($dsn, $db_config['login'], $db_config['password'], $db_config['options']);
        } catch (PDOException $e) {
            aboard(500);
        }
    }

    public function query ($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

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