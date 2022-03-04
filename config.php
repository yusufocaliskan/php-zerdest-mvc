<?php

//Root path
define('ROOT', dirname(__FILE__).'/');

define('BASEPATH','http://zerdest.dv/');

//Framework
define('FRAMEWORK', ROOT.'framework/');
define('FRAMEWORK_ASSETS', ROOT.'framework/assets/');
define('APP', ROOT.'app/');
define('CONTROLLERS', APP.'controllers/');
define('VIEWS', APP.'views/');
define('MODELS', APP.'models/');
define('LAYOUT', VIEWS.'layouts/');

//themes
define('THEME_DEFAULT_NAME','Falcon/');
define('THEME_PATH', ROOT.'themes/');

//Database bağlantı bilgileri
define('HOST','localhost');
define('DB_NAME','book_store');
define('USER_NAME','root');
define('USER_PASSWORD', 'Ma5ik33ysi45+');
define('DB_ENGINE','mysql');