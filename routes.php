<?php

$router->get('', 'PagesController@index');

$router->get('properties', 'PropertiesController@index');
$router->get('properties/show', 'PropertiesController@show');
$router->get('properties/create', 'PropertiesController@create');
$router->post('properties/store', 'PropertiesController@store');
$router->get('properties/destroy', 'PropertiesController@destroy');

$router->get('properties/populate', 'PropertiesController@populate');
