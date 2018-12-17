<?php
/**
 * Created by PhpStorm.
 * User: Musso
 */

require 'vendor/autoload.php';
require 'core/bootstrap.php';

session_start();

use App\Core\Router;
use App\Core\Request;

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());