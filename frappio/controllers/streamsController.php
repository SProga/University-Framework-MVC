<?php
namespace myFramework;

class streamsController extends PageController
{


  public function __construct()
  {
    $this->makeModel('streamsModel');
    $this->run();
  }//put login model

  public function run($params = NULL)
  {
    $this->user= Registry::get('user');
    $this->auth = Registry::get("Auth");
    $this->auth->clearErrors();
  }

  public function index ( )
  {
    $view = $this->makeView('streams');
    $model = $this->getModel();
    $view->setModel($model);
    $view->run();
  }

  public function getsStream()
  {

  }


}
