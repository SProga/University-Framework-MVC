<?php
namespace myFramework;

class Router implements RouterInterface
{
  protected $controller= MYFRAMEWORK."homeController";
  protected $action="index";
  protected $params = [];
  protected $route = [];

  public function __construct()
  {

    $this->parseUri();


  }

  public function parseUri()
  {
    $request = trim($_SERVER['REQUEST_URI'],'/');  //trim the request by /


    if(!empty($request))  //if the request is not empty
    {
      $url = explode('/',$request);  //create an array by seperating the elements by the /

      if(isset($url[0])) //if the first element is set which will always be the controller then
      {
        $this->route["controller"]=$this->setController($url[0]); //set the route array to store the controller
      }

      if(isset($url[1]))//if the second element is set which will always be the method then
      {
        $this->route["action"]=$this->setAction($url[1]);  //set the route array to store the action
      }
      unset($url[0],$url[1]); //remove the controller and the method from the array

      if(!empty($url))
      {
        $this->route["params"]=$this->setParams(array_values($url)); //set the params
      }

    }
    return $this->route;
  }


  public function setController($controller) {


    $controller = MYFRAMEWORK.strtolower($controller) ."Controller";


    if (!class_exists($controller)) {

      return $this->controller;
    }
    else {

      $this->controller = $controller;
      return $this->controller;
    }


  }

  public function setAction($action) {

    $reflector = new \ReflectionClass($this->controller);  // reports description about a class .
    if (!$reflector->hasMethod($action)) {
      return $this->action;
    }
    $this->action = $action;
    return $this->action;
  }

  public function setParams(array $params) {
    $this->params = $params;
    return $this->params;
  }

  public function getController()//get the controllers
  {
    $this->controller = $this->controller;
    return $this->controller;
  }

  public function getAction()  //get the action or method to be done
  {
    return $this->action;
  }

  public function getParams()  //gets the required parameters
  {
    return $this->params;
  }




}
