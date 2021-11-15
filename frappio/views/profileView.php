<?php
namespace myFramework;

class profileView extends View
{

  public function run()
  {

    $user = Registry::get('user'); //get the User
    $errors = Registry::get("Auth"); //get the Authentication
    $errors = $errors->getErrors(); //get any errors generated from the query called in the model
    $model = $this->getModel(); //get the model for optional queries
    $userdata = $this->getData( );  //store the data from the view in the userdata

   if($user->isUserLoggedIn() == true)
   {
    $profiledata = $model->findUserCourses($userdata);
    $errors = Registry::get("Auth");
    $errors = $errors->getErrors();
    $this->addVars("status","loggedIn");
    $this->addVars('profiledata',$profiledata);
    $userdata=$user->allInfo();
    $this->addVars('userdata',$userdata);

   }
   else {
     $this->addVars("status","not logged In");
   }

    $this->addVars('title','Manage Profile');
    $this->addVars('errors',$errors);
    $this->render();   //render the view



}

}
