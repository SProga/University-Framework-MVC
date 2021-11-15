<?php
namespace myFramework;


class profileController extends PageController {


  public function __construct()
  {

  $this->makeModel('profileModel');


  }

  public function index ( )
  {

   $view =$this->makeView("profile");  //create the viewobject for the default profile page
   $model = $this->getModel(); //get the profile model object
   $data = $model->findAll();  //find all the user courses
   $view->setData($data); //set the data in the view
   $view->setModel($model); //send the object to the view so optional queries can be executed
   $view->run();  //trigger the view to display the template file and necesssary data modifications
  }

  public function start($params)
  {

   $model = $this->getModel();
   $courses = $model->findOneRecord($params);

   $user = Registry::get('user');    //get the User Object
   $email = $user->getData('email'); //get the User Email
   $courses += array('email'=> $email); //store add the users email to the courses

  $exist = $model->findOne('user_courses', $courses);  //find if the user is already registered for the course


  if(!empty($courses['email']) && $exist == false)  //if user has not registered
  {
     $model->add($courses); //add the course to the user profile
  }

   header('Location: /profile');

}

}
