<?php
$router->get('login', 'AuthController@index');
$router->post('loginCheck', 'AuthController@loginCheck');
$router->get('logout', 'AuthController@logout');
$router->get('register', 'AuthController@register');
$router->post('registerNewUser', 'AuthController@registerNewUser');

$router->get('forgotPassword', 'ResetController@index');
$router->post('sendMessage', 'ResetController@sendMessage');
$router->get('resetPassword', 'ResetController@resetPassword');
$router->post('saveNewPassword', 'ResetController@saveNewPassword');

$router->get('', 'UserController@index');
$router->post('updateUser/{id}', 'UserController@updateUser');