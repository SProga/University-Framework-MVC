<?php
namespace myFramework;

class loginController extends PageController
{


  public function __construct()
  {
    $model  = $this->makeModel('loginModel');  // make the Login Model

  }//put login model

  public function index ( )
  {
    $view = $this->makeView("login");
    $model = $this->getModel();
    $view->setModel($model);
    $view->run();
  }

  public function login ( )
  {

    if (isset($_POST)){

      $user = $this->model->findOne('users',$_POST);
      $view = $this->makeView("login");
      $view->setData($user);
      $view->run();

    }

  }



}
