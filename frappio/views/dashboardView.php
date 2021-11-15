<?php
namespace myFramework;


class dashboardView extends View {

  public function run()
  {
    $user = Registry::get('user'); //get the User
    $errors = Registry::get("Auth"); //get the Authentication
    $errors = $errors->getErrors(); //get any errors
    $userdata = $this->getData( ); //get the data from the model query
    $profile = $user->allInfo(); //get the information of the user

    if($user->isUserLoggedIn() == true)
    {
      $this->addVars("status","loggedIn");
    }
    else {
      $this->addVars("status","not logged In");
    }

    $this->addVars('title','dashboard');
    $this->addVars('errors',$errors);
    $this->addVars('userdata',$profile);
    $this->addVars('courses',$userdata);
    $this->render();   //render the view

  }



}
