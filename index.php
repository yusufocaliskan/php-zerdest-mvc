<?php

ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

//Inlude the config file
require "config.php";


//Step#1 : Load the framework
//========================================================================================
function load($class_name)
{
    require FRAMEWORK.$class_name.'.php';
}

spl_autoload_register('load');


//Step#2 : Create the core and run it
//========================================================================================

$core = new core();
$core->run();
