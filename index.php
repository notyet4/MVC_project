<?php
ini_set('desplay_errors',1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
session_start();
require_once (ROOT . '/components/Router.php');


$router = new Router();
require_once (ROOT.'/components/Db.php');
$router->run();