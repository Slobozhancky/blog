<?php

class Database {
    private $connection;

    public function __construct(array $db_config)
    {
        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['database']};charset={$db_config['charset']}";

        try {
            $this->connection = new PDO($dsn, $db_config['login'], $db_config['password'], $db_config['options']);
        } catch (PDOException $e) {
            aboard(500);
        }
    }

    public function query ($query) {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }

}