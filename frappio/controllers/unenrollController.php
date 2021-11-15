<?php

namespace myFramework;


class unenrollController extends PageController {

public function __construct()
{
    $model = $this->makeModel('unenrollModel');
    $this->run();
}

public function index()
{
  $view = $this->makeView("unenroll");
  $view->run();
}

public function unenroll($params)
{
  $view = $this->makeView("unenroll");  //create the viewobject for the default profile page
  $model = $this->getModel(); //get the profile model object
  $data = $model->findOneRecord("",$params);  //find all the user course to be deleted
  $view->setData($data); //set the data in the view
  $view->setModel($model); //send the object to the view so optional queries can be executed
  $view->run();  //trigger the view to display the template file and necesssary data modifications
}


public function run( )
{
  $this->user= Registry::get('user');
  $this->auth = Registry::get("Auth");
  $this->auth->clearErrors();
}


}
