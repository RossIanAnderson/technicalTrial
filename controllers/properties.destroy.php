<?php

$property = $app['db']->delete('properties', 'uuid', Input::get('uuid'));

header('Location: /properties');