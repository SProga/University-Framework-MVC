<?php
namespace myFramework;

class signupController extends PageController
{

  public function __construct()
  {
    $this->makeModel('signupModel');
    $this->run();
  }//put login model

  public function index ( )
  {

  $view = $this->makeView("signup");
  $view->run();

  }
    public function run($params = NULL)
    {
      $this->user= Registry::get('user');
      $this->validator = Registry::get("validator");
      $this->validator->clearErrors();
    }

  public function signup( )
  {

    if (isset($_POST)){
     
      $user = $this->model->add($_POST);
      $view = $this->makeView("signup");
      $view->setData($user);
      $view->run();
      exit();
    }


  }




}
