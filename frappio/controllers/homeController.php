<?php
namespace myFramework;

class homeController extends PageController {


public function __construct()
{
   $this->makeModel('indexModel');  // make the homeModel

}

public function index ( )
{
 $user = Registry::get('user');
 $view =$this->makeView("index");
 $model = $this->getModel();
 $auth = Registry::get('Auth');
 $rules = $auth->authenticate($user,'home');

 $view->setModel($model);
 $view->run();


}



}


//to be Placed in the frappio Directory
