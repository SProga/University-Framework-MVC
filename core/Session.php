<?php
namespace myFramework;

class Session extends SessionAbstract
{

public function __construct()
{
  self::SessionStart();
}

public static function SessionStart( )
{

if(self::$_sessionStarted == false) //if sessionstart is false
{
   session_start();  //start a session
   self::$_sessionStarted == true;  //set the sessionstart variable to true.
}

}

public static function set($key,$value)
{
  $_SESSION[$key] = $value;
}

 public static function get($key)
{
   if(isset($_SESSION[$key]))
   {
     return $_SESSION[$key];
   }
   else
   {
     //trigger error;
   }
}


}  // end Session class
