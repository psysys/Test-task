<?php
use app\core\Route;

define('BASEDIR', __DIR__);
$config = include 'config/config.php';
if ($config['display_error'] == 1)
    ini_set('display_errors', 1);
require_once '../app/core/Loader.php';

$loader = new Loader();
spl_autoload_register([$loader,'loadClasses']);

$route = new Route();
$route->Run();

