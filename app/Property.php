<?php

class Property
{
    protected $passed = false;

    public function create($fields)
    {
        try
        {
            App::get('database')->insert('properties', $fields);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

}