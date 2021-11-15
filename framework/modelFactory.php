<?php
namespace myFramework;


class modelFactory implements modelFactoryInterface
{

  private $model;

  public static function makeModel(string $modelName)
  {
    $validator = Registry::get("validator");  //check that the model name is string
    $validator->IsString($modelName);

    if(file_exists(MODELS_DIR.DS.$modelName.".php")) //check that the model file exists
    {

      $modelClass = MYFRAMEWORK.$modelName;  //Add the myframework namespace the model name

      if(class_exists($modelClass))  //check to see if the model class exists
      {
        $modelClass = new \ReflectionClass($modelClass); // new reflectionClass instantiate a new model

      }
      if ($modelClass->isSubClassOf(MYFRAMEWORK.'Model')) //if the modelclass is a subclass of Model
      {

        return $modelClass->newInstance();  //return a new instance of the model class

      }
      else {
        trigger_error('Invalid object used. Must be a Model object', E_USER_ERROR);
        return FALSE;
      }

    }
    trigger_error('Error occured Model not found', E_USER_ERROR);

  }

} //modelFactory
