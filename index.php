<?php

ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

//Config dosyasını çek.
require "config.php";



//Step#1 : Core oluıtur
//========================================================================================

require FRAMEWORK.'database.php';
require FRAMEWORK.'controller.php';
require FRAMEWORK.'model.php';
require ROOT.'framework/core.php';



$core = new Core();
$core->run();
