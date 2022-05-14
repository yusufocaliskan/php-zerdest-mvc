<?php

ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

//Inlude the config file
require "config.php";


use framework\core;
use framework\router;

use App\Controllers\users;

//Step#1 : Load the framework
//========================================================================================
function load($class_name)
{
    $class_name = str_replace('\\','/', $class_name);
    
    require $class_name.'.php';
    
}

spl_autoload_register('load');


//Step#2 : Create the core and run it
//========================================================================================

$router = new router();

$router->get('/user/', users::class, 'home');
$router->post('/user/add/', users::class, 'create');
$router->get('/user/list/', users::class, 'list');
$router->put('/user/update/', users::class, 'update');
$router->delete('/user/delet/{id}', users::class, 'delete');
