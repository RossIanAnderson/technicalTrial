<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table){
        $stmt = $this->pdo->prepare("SELECT * FROM {$table}");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $params){
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($params)),
            ':' . implode(', :', array_keys($params))
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function where($table, $where, $what){
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$where} = '{$what}'");
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delete($table, $where, $what){
        $stmt = $this->pdo->prepare("DELETE FROM {$table} WHERE {$where} = '{$what}'");
        return $stmt->execute();
    }

}