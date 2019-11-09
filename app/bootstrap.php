<?php

$app['config'] = [
    'db' => require 'config/db.php',
    'api' => require 'config/api.php'
];

$app['db'] = new QueryBuilder(
    Connection::establish($app['config']['db'])
);