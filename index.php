<?php
//FRONT CONTROLLER
set_time_limit(0);
//определение путей
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');


//создание копии класса Роутер и вызов его метода ран
$router = new Router();
$router->run();
