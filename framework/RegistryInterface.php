<?php
namespace myFramework;

interface RegistryInterface
{

  public static function getInstance();
  public  static function set($key, $value);
  public  static function get($key);
  public  static function remove($key);



}
