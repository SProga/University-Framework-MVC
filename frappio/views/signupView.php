<?php
namespace myFramework;

class SignUpView extends View
{

	public function run()
	{
	$user = Registry::get('user'); //get the User
	$errors = Registry::get("validator"); //get the Authentication
	$errors = $errors->getErrors();
  $userdata = $user->allInfo();


  $user = $this->getData();
	$this->addVars('userdata',$userdata);
	$this->addVars('title','SignUp');
	$this->addVars('errors',$errors);
	$this->addVars('status','not logged in');
	$this->render();   //render the view


	}
}
