<?php

require_once 'vendor/autoload.php';

use Application\Core\Router;

define("APPLICATION_PATH", __DIR__);
define("STYLESHEETS_PATH", "../../public/styles/");

$router = new Router();
$router -> run(explode('/', $_SERVER['REQUEST_URI']));