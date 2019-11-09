<?php

$router->get('', 'controllers/index.php');

$router->get('properties', 'controllers/properties.php');
$router->get('properties/show', 'controllers/properties.show.php');
$router->get('properties/create', 'controllers/properties.create.php');
$router->post('properties/store', 'controllers/properties.store.php');
$router->get('properties/destroy', 'controllers/properties.destroy.php');

$router->get('populate', 'controllers/api-call.php');
