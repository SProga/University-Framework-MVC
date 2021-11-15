<?php
namespace myFramework;


class coursesController extends PageController {

public function __construct()
{
  $this->makeModel('coursesModel'); //make the coursesModel
}

public function index()
{
  $view = $this->makeView('courses'); //make the view object and store it in the @view variable
  $model = $this->getModel(); //store the model in the $model varibale for optional queries
  $view->setModel($model); //set the model in the view to retrieve or modify any data.
  $view->run();
}

public function edit()
{
  $user = Registry::get('user');
  $view =$this->makeView("courses");
  $model = $this->getModel();
  $auth = Registry::get('Auth');
  $hasPermission = $auth->authenticate($user,'dashboard');

 if($hasPermission == true)
 {
   $view->setModel($model);
   $view->run();
 }
 else {
   header('Location: /home');
 }
}

public function delete($data)
{
  echo " course id to be deleted is ".$data;
  $view =$this->makeView("courses");
  $model = $this->getModel();
  $view->setModel($model);
  $view->run();

}


} //end coursesController
