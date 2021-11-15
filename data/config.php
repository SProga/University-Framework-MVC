<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__DIR__).DS);
define('FONTS_DIR',ROOT.'fonts'.DS);
define('IMAGES_DIR',ROOT.'images'.DS);
define('DATA_DIR',ROOT.'data'.DS);
define('FRAPPIO_DIR',ROOT.'frappio'.DS);
define('FRAMEWORK_DIR',ROOT.'framework'.DS);
define('TPL_TEMPLATES',ROOT.'tpl'.DS);
define('CORE_DIR',ROOT.'core'.DS);
define('AUTOLOADER',ROOT.'data'.DS.'autoloader');
define('CONTROLLERS_DIR',FRAPPIO_DIR.'controllers');
define('MODELS_DIR',FRAPPIO_DIR.'models');
define('VIEWS_DIR',FRAPPIO_DIR.'views');
define('MYFRAMEWORK','myFramework'.DS);
define('CSS_DIR',ROOT.'css'.DS);

//$modules = [ROOT,FONTS_DIR,DATA_DIR,FRAPPIO_DIR,TPL_TEMPLATES,FRAMEWORK_DIR,IMAGES_DIR,FONTS_DIR,CORE_DIR,CONTROLLERS_DIR,MODELS_DIR,VIEWS_DIR];
//set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
//spl_autoload_register('spl_autoload',false);

require_once("autoloader.php");


define('DB_HOST','localhost');
define('DB_UNAME','root');
define('DB_PASS',' ');
define('DB_DBNAME',' ');


define('PERMISSION_DENIED', 0);
define('PERMISSION_READ', 1);
define('PERMISSION_ADD',  2);
define('PERMISSION_UPDATE', 4);
define('PERMISSION_DELETE', 8);
