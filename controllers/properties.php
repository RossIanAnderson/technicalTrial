<?php

$properties = $app['db']->selectAll('properties');

require 'views/properties.index.php';