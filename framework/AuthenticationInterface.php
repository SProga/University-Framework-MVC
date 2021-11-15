<?php
namespace myFramework;

interface AuthenticationInterface
{

  static public function getInstance() : AuthenticationInterface;
//  public function readConfig(string $configuration_file) : bool;
  static public function authenticate (User $user,string $page);
  //public function getErrors():array;

}
