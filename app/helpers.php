<?php

function dd($data){
    echo "<pre>";
    die(var_dump($data));
    echo "</pre>";
}

function view($name, $data = null){
    (isset($data)) ? extract($data) : '';
    return require "views/{$name}.view.php";
}

function sanitize($string){
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
