<?php
namespace myFramework;


class logoutController extends PageController
{

	public function logout( )
	{
		$unset = Registry::remove('user');
	  $session= Registry::get('session');
		$session::destroySession();
		header('Location:../home');//redirect the user to the home page
	}
}
