<?php

//include 'connection.php';

class Model {
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function selectAll($table)
    {
        $selectAll = "SELECT id, name FROM $table;";
        $statement = $this->pdo->prepare($selectAll);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }
    public function delete($table,$id)
    {
        $deleteQuery = "DELETE FROM $table WHERE id='$id'";
        $statement = $this->pdo->prepare($deleteQuery);
        $statement->execute();
    }
}