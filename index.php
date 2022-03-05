<?php

ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

//Config dosyasını çek.
require "config.php";


//Step#1 : Dosyaları yükle
//========================================================================================
function load($class_name)
{
    require FRAMEWORK.$class_name.'.php';
}
spl_autoload_register('load');


//Step#2 : Core oluıtur
//========================================================================================



$core = new core();
$core->run();
