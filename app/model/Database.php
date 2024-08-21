<?php

namespace Model;
use PDO;

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = ''){

        // I put this in the __construct so that we will only connect to the database once
        // because if not, everytime we run a query, we would need to start this everytime
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // Where SQL Queries is put
    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }


    // For finding values from the Query:

    // find() = Find a Match
    public function find() {
        return $this->statement->fetch();
    }

    // findAll() = Find ALL Match    
    public function findAll() {
        return $this->statement->fetchAll();
    }

    // findOrFail() = Show an Error if nothing's found
    public function findOrFail() {
        $result = $this->findAll();

        if (! $result) {
            abort();
        }
        
        if (count($result) == 1) {
            return $result[0];
        }
        
        return $result;
    }
}