<?php
namespace myFramework;

class confirmView extends View {

  public function run()
  {
    $user = Registry::get('user');
    $errors = Registry::get("validator"); //get the Authentication
    $errors = $errors->getErrors(); //get all errors
    $profile = $user->allInfo(); //get the user info for the profile

    $this->addVars("userdata",$profile);
    $this->addVars("status","loggedIn");
    $this->addVars('title','Confirm');
    $this->addVars('errors',$errors);

    $this->render();   //render the view

  }





}
