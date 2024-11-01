<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Project\core\Router;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();
$router->run();