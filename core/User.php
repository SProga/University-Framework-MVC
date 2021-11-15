<?php
namespace myFramework;

//class User a singleton so that only one user can be created at a time
class User {

  private static $instance = null;


  private $userdata = array(
                            "name"=>"",
                            "email"=>"",
                            "pwd"=>"",
                            "role"=>" ",
                            "status"=>" "


  );



  static public function getInstance()
  {
    if(Registry::get('user') == null){

      self::$instance = new User();
      Registry::set('user', self::$instance);
    }
    return Registry::get('user');


  } // end get instance function


public function init(array $userdata)
{
  $this->setData('name',$userdata['name']);
  $this->setData('email',$userdata['email']);
  $this->setData('pwd', $userdata['password']);
  $this->setData('role', $userdata['role']);
  $this->setData('status',"loggedIn");

}

  public function setData($name,$val)
  {
    if (!isset($name) || !is_string($name) || !isset($val)|| empty($name) || empty($val))
    {
      trigger_error("Invalid parameter sent to set()", E_USER_ERROR);
      return false;
    }
    else {

      $this->userdata[$name] = $val;
    }
  }

  public function getData($key)
   {
     $key = strtolower($key); //convert the key to lowercase

    if(isset($this->userdata[$key])){
      return $this->userdata[$key];
    }
    if(empty($this->userdata[$key]))
    {
       trigger_error("register value is empty", E_USER_ERROR);
       return false;
    }
   }

  public function getUserRole()
  {
    return $this->userdata['role'];
  }

 public function allInfo()
 {
   return $this->userdata;
 }



  public function isUserLoggedIn( ):bool
  {
   if($this->userdata['status'] == 'loggedIn'){
    return true;
     }
   return false;
  }

/**
 * Do not allow cloning.
 */
private function __clone() {}



} //end User Classs
