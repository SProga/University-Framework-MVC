<?php
namespace myFramework;


class unenrollView extends View {


  public function run()
  {
    $user = Registry::get('user');
    $errors = Registry::get("validator"); //get the Authentication
    $errors = $errors->getErrors();
    $model = $this->getModel();

    $course = $this->getData();

    if($user->isUserLoggedIn() == true)
    {
      $profile = $user->allInfo();
      $this->addVars("status","loggedIn");
      $this->addVars("userdata",$profile);
      $this->addVars('course',$course);
      }
    else {
      echo "not logged in";
      $this->addVars("status","not logged In");
    }

    $this->addVars('title','Unenroll');
    $this->addVars('errors',$errors);
    $this->render();   //render the view

  }



}
