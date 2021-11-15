<?php
namespace myFramework;

abstract class ValidatorAbstract
{

abstract protected function isEmailValid(string $name):bool;
abstract protected function isPasswordValid(string $pwd):bool;


final public static function IsString($param):bool
{
  if (is_string($param)) {
      return true;
  }

    trigger_error('Invalid parameter received. Parameter must be a string', E_USER_ERROR);
    return false;
}

final public static function ensureParameterNotEmpty($param):bool
{
  if (empty($param)) {
    trigger_error( $msg . " cannot be empty : ", E_USER_ERROR);
    return false;
  }
  return true;
}


}
