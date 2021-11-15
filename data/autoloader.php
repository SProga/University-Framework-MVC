<?php


spl_autoload_register('myAutoLoader');


function myAutoLoader($className)
{
  $name = str_replace("myFramework".DS,"",$className);

	$searchFiles = array(
       	    FRAMEWORK_DIR.$name.'.php',
			      CORE_DIR.$name.'.php',
            CONTROLLERS_DIR.DS.$name.'.php',
            MODELS_DIR.DS.$name.'.php',
            VIEWS_DIR.DS.$name.'.php',
            DATA_DIR.$name.'.php'
    );

    foreach ($searchFiles as $file) {
    	if (file_exists($file)) {
      require_once($file);
			return;
    	}
    }









} //AUTOLOADER
