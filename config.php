<?php
    return [
        'db' => [
            'host'      => '127.0.0.1',
            'username'  => 'root',
            'password'  => 'root',
            'db'        => 'technicalTrial',
            'options'   => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        ],
        'api' => [
            'url' => "http://trialapi.craig.mtcdevserver.com/api/properties",
            'app_key' => "3NLTTNlXsi6rBWl7nYGluOdkl2htFHug"
        ]
    ];