<?php

ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

//Inlude the config file
require "config.php";


use framework\core;
use framework\route;
use framework\router;
use app\controllers\users;

//Step#1 : Load the framework
//========================================================================================

require_once __DIR__ . '/vendor/autoload.php';


//Step#2 : Create the router and run it
//========================================================================================

$route = new route();

$route->get('/user/', users::class, 'home');
$route->post('/user/add/', users::class, 'create');
$route->get('/user/list/', users::class, 'list');
$route->put('/user/update/', users::class, 'update');
$route->delete('/user/delete/', users::class, 'delete');

