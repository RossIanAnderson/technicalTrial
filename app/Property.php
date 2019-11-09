<?php

class Property
{
    protected $passed = false,
        $errors = array(),
        $db = null;

    public function __construct()
    {
        $this->db = new QueryBuilder(
            Connection::establish(require 'config/db.php')
        );
    }

    public function create($fields)
    {
        try
        {
            $this->db->insert('properties', $fields);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

}