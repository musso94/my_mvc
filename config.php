<?php
/**
 * Created by PhpStorm.
 * User: Musso
 */

return [
    'database' => [
        'name' => 'crm',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
//            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'smtp_user' => '',
    'smtp_pass' => ''
//    'smtp_user' => 'musso@gmail.com',
//    'smtp_pass' => '***************'
];
