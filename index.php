<?php

require 'vendor/autoload.php';
require 'app/bootstrap.php';

require Router::load('routes.php')
    ->direct(Request::uri(), Request::method());