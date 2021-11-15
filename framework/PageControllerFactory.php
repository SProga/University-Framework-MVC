<?php
namespace myFramework;


/*factory for creating a PageController Object */

class PageControllerFactory implements PageControllerFactoryInterface
{

static public function makePageController(String $controller)
{

      $validator = Registry::get("validator");
      $validator->IsString($controller);

      $name = str_replace("myFramework".DS,"",$controller);
      $contollerName = CONTROLLERS_DIR . DS .$name.'.php';

       if (file_exists($contollerName)) {
        if (class_exists($controller)) {

          $controllerClass = new \ReflectionClass($controller);

   if ($controllerClass->isSubClassOf(MYFRAMEWORK.'PageController')) {

                return $controllerClass->newInstance();
          }
            else {
            trigger_error('Invalid object used. Must be a PageController object', E_USER_ERROR);
            return FALSE;
          }
        }
      }
      trigger_error('No file exists for the PageController class ' . $contollerName , E_USER_ERROR);
      return false;
      }

}
