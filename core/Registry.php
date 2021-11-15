<?php
namespace myFramework;
//A way to store objects neatly
//Singleton a class than can only be instantiated once;

class Registry implements RegistryInterface {

private static $_instance; //hold the instance of the Registry
private static $_store;

protected static $myvalues = array(
                                    "user"=>null,
                                    "validator"=>null,
                                    "session"=>null,
                                    "auth"=>null,
                                    "errorHandler"=>null
                                    );


private function __construct(){}
  /**
	 * Do not allow cloning.
	 */
private function __clone() {}

public static function getInstance()
{

 if(!self::$_instance instanceof self){
    self::$_instance = new self();

  if(empty($_SESSION['registry']))  //if the session registry is empty then do
{

  if(self::$myvalues["session"] == null)  //check if the session has been started already
  {
    $session = new Session(); //create a new session
    self::$myvalues["session"] = $session; //store the session in the array
  }

  if(self::$myvalues["validator"] == null) { //is the validator has not been created
  self::$myvalues["validator"] = new Validator(); //store a new validator in the array
  }


//If the User Object is null then create a new User else do nothing .
  if(self::$myvalues["user"] == null)
  {
  self::$myvalues["user"] = User::getInstance();  //get a User Instance
  }

  if(self::$myvalues["auth"] == null) {
  self::$myvalues["auth"] = Authentication::getInstance();//get a Auth Instance
  }

  $_SESSION['registry'] = self::$myvalues;  //sotre the values within the session['registry']
  self::$_instance = $_SESSION['registry']; //store the session in the private instance
  return $_SESSION['registry'];
}

}

}

 public  static function set($key,$val){

   $key = strtolower($key); //convert the key to lowercase

   if (!isset($key) || !is_string($key) || !isset($val)|| empty($key) || empty($val))  {
     trigger_error("Invalid parameter sent to set()", E_USER_ERROR);
     return false;
   }
   else{
     $_SESSION['registry'][$key] = $val;
     return true;
   }
} // end Set function

 public  static function get($key)
{
   $key = strtolower($key); //convert the key to lowercase

  if(isset($_SESSION['registry'][$key])){
    return $_SESSION['registry'][$key];
  }
  if(empty($_SESSION['registry'][$key]))
  {
     return null;
  }

}


  static public function remove($key):bool
{
     $key = strtolower($key);  //convert the key to lowercase
    if(isset($_SESSION['registry'][$key]))
    {
        unset($_SESSION['registry'][$key]);
         return true;
    }
    else {
      return false;
    }
}


}  //end Registry Class
