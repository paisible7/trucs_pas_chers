<?php

class Database
{
    protected $pdo;
    public function __construct($config)
    {


        $dsn = "mysql:" . http_build_query($config, '', ';');
        $this->pdo = new PDO($dsn);
    }


    public function query($query, $params = [])
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement;
        //->fetchAll()
    }
}
