<?php
namespace myFramework;


class indexView extends View
{

  public function run()
  {
    $user = Registry::get('user'); //get the User
    $errors = Registry::get("Auth"); //get the Authentication
    $errors = $errors->getErrors(); //get any errors
    $profile = $user->allInfo(); //get the information of the user
    $model = $this->getModel();
    $courses = $model->findAll();



    if($user->isUserLoggedIn() == true)
    {
      $this->addVars("status","loggedIn");
      $this->addVars('courses',$courses);
      $this->addVars('title','Home');
      $this->addVars('errors',$errors);
      $this->addVars('userdata',$profile);
      $this->render();
    }
    else {
    
      $this->addVars("status","not logged In");
      $this->addVars('courses',$courses);
      $this->addVars('title','Home');
      $this->addVars('errors',$errors);
      $this->addVars('userdata',$profile);
      $this->render();
    }


 //render the view

  }


}
