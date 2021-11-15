<?php
namespace myFramework;

class Authentication implements AuthenticationInterface
{
  use ErrorHandler;   //user the error handler trait to  set and get error messages

  private static $instance;

  static public function getInstance() :AuthenticationInterface   //create a singleton instance of the AuthenticationClass
  {
    if(empty(self::$instance))   //if the instance if empty
    {
      self::$instance = new self();  //create a new instance
      return self::$instance; //return the new instance
    }
    else {
      return self::$instance; //else if the instance exist already return the new instance
    }

  }

  static public function authenticate (User $user ,string $page) {

  $user = $user->getData('role');
  $pageRule= parse_ini_file(DATA_DIR.'roles.php.ini');

 foreach($pageRule as $pages=>$key)
 {
    if($pages == $page)
    {
      foreach($pageRule[$pages] as $page=>$key)
      {
        if($user == $page)
        {
          if($key == true)
          {
          return true;
          }
          else {
          return false;
          }
        }
      }
    }
 }

}

  static public function validateLogin($user , $password):bool   //validate the email and the password entered
  {

    $validator = Registry::get("validator");  //get the validator

    if($validator->isPasswordValid($password) && $validator->isEmailValid($user))  //chck if the password and email is valid
    {
      return true;
    }
    else {
      return false;
    }

  } // end validateLogin


} //end Authentication
