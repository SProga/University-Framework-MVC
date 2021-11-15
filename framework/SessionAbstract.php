<?php
namespace myFramework;

abstract class SessionAbstract {

protected static $_sessionStarted = false;

abstract public static function SessionStart( );
abstract public static function set($key,$value);
abstract public static function get($key);

final public static function destroySession()
{
  if($_sessionStarted == true)
  {
    session_unset();
    session_destroy();
  }
}


} //end SessionAbstract
