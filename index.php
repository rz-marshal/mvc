<?php

require_once 'vendor/autoload.php';


use Application\Core\Router;
use Application\Core\Database;

define("APPLICATION_PATH", __DIR__);
define("STYLESHEETS_PATH", "../../public/styles/");
define("SCRIPTS_PATH", "../../public/scripts/");
define("IMAGES_PATH", "../../public/images/");

$db = new Database();
$router = new Router();
$router -> run(explode('/', $_SERVER['REQUEST_URI']));