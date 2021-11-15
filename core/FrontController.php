<?php
namespace myFramework;

class FrontController implements FrontControllerInterface
{

private $uri;  //gets the uri of the page
private $controller; //stores the controller
private $action;//stores the method/action to invoke
private $params;//stores any parameters which are passed in


public function __construct( )
{

}

public function init()
{
  $registry = Registry::getInstance();  //create and instance of the registry
  $this->uri = new Router();    //create a new router to parse URI
  $this->controller =$this->uri->getController();  //get the controller name
  $this->action = $this->uri->getAction();  //get the action
  $this->params = $this->uri->getParams(); //get the parameters


  if(!empty($this->controller))  //check if the controller isempty
  {
    $this->controller=PageControllerFactory::makePageController($this->controller);   // create the related PageController
  }

} // end init function

public function run( )
{
call_user_func_array([$this->controller, $this->action], $this->params);
}


}
