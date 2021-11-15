<?php
namespace myFramework;


class dashboardController extends PageController
{

public function __construct()
{
  $this->makeModel('dashboardModel');
}
public function index()
{
  $user = Registry::get('user');
  $view =$this->makeView("dashboard");
  $model = $this->getModel();
  $auth = Registry::get('Auth');
  $hasPermission = $auth->authenticate($user,'dashboard');

 if($hasPermission == true)
 {
   $view->setModel($model);
   $view->run();
 }
 else {
   header('Location: /signup');
 }

}

public function Managecourses($params = NULL)
{
  $user = Registry::get('user');
  $view =$this->makeView("dashboard");
  $model = $this->getModel();
  $auth = Registry::get('Auth');
  $hasPermission = $auth->authenticate($user,'dashboard');

  if($hasPermission == true)
  {
    $courses = $model->findAllCourses();
    $view->setData($courses);
    $view->setModel($model);
    $view->run();
  }


}




}
