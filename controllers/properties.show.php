<?php

$property = $app['db']->where('properties', 'uuid', Input::get('uuid'));

require 'views/properties.show.php';