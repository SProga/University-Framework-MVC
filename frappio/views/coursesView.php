<?php
namespace myFramework;


class coursesView extends View {


  public function run()
  {
    $user = Registry::get('user');
    $errors = Registry::get("validator"); //get the validator
    $errors = $errors->getErrors(); //get any errors created
    $model = $this->getModel(); //get the model
    $courses = $model->findAll(); //find all the courses
    $profile = $user->allInfo(); //get the user information

    if($user->isUserLoggedIn() == true)
    {

      $this->addVars("status","loggedIn"); //change the status to logged in
      $this->addVars("userdata",$profile); //add the userdata to the template
    }
    else {
      $this->addVars("status","not logged In");
      $this->addVars("userdata",$profile);
    }

    $this->addVars('title','Courses');
    $this->addVars('errors',$errors);
    $this->addVars('courses',$courses);
    $this->render();   //render the view

  }



}
