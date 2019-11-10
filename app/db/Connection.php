<?php

class Connection
{
    public static function make($config)
    {
        try{
            return new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['db'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }
        catch(PDOException $e){
            die("Error:- " . $e->getMessage());
        }
    }
}