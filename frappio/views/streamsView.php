<?php
namespace myFramework;


class streamsView extends View
{


	public function run()
	{
					$user = Registry::get('user');
		      $errors = Registry::get("validator"); //get the Authentication
		      $errors = $errors->getErrors();
		      $model = $this->getModel();
		      $streams = $model->findAll();
          $userdata = $this->getData();
          $profile = $user->allInfo();

					if(!empty($userdata))
					{
						 $user->init($userdata);
					}

					if($user->isUserLoggedIn() == true)
					{
						$profile = $user->allInfo();
						$this->addVars("status","loggedIn");
						$this->addVars("userdata",$profile);
					}
					else {
						$this->addVars("status","not logged In");
						$this->addVars("userdata",$profile);
					}

		      $this->addVars('title','Streams');
		      $this->addVars('errors',$errors);
		      $this->addVars('streams',$streams);
		      $this->render();   //render the view
 }
}
