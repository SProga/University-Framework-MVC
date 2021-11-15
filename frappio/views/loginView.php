<?php

namespace myFramework;

class loginView extends View
{


	public function run()
	{

		$user = Registry::get('user'); //get the User
		$errors = Registry::get("Auth"); //get the Authentication
    $errors = $errors->getErrors(); //get any errors generated
	  $userdata = $user->allInfo( ); //get the data
    $initData = $this->getData();

	  if(!empty($initData))
		{
			 $user->init($initData);
		}


		if($user->isUserLoggedIn() == true)
		{

			$this->addVars("status","loggedIn");
			$this->addVars('title','Login');
			$this->addVars('errors',$errors);
			$this->addVars('userdata',$userdata);
		  header('Location: /home');

		}
    else {
    	$this->addVars("status","not logged In");
			$this->addVars('title','Login');
			$this->addVars('errors',$errors);
			$this->addVars('userdata',$userdata);
			$this->render();

    }


	}


}
