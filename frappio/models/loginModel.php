<?php
namespace myFramework;

class loginModel extends Model
{
  protected static $data_file;
  protected $inventory = [];
  protected $result;

public function findOne(string $table, array $data){

  $email = $data['email'];
  $password = $data['password'];

if(empty($email) && !empty($password))
{
  $errors = Registry::get("Auth");
  $errors->setError(" Email empty ");
}

if(empty($password) && !empty($email))
{
  $errors = Registry::get("Auth");
  $errors->setError(" password empty ");
}


if((!empty($email)) && (!empty($password)))
{

  $sql = $this->conn->prepare("SELECT name, role, email , password
          FROM $table
          WHERE email = '$email'
          AND  password ='$password'");

  $this->result = $sql->execute();

  if (!$this->result)
  {
    die('There was an error running the query [' . $this->conn->error . ']');
  }
  if ($sql->rowCount() != 1)//if the user doesn't exist
  {
    $errors = Registry::get("Auth");
    $errors->setError("User was not found");
    return FALSE;
  }
  else
  {

    return ($sql->fetch(\PDO::FETCH_ASSOC)); //fetch an associative array of the data;
  }

  }
}

public function findAll(){}
public function update(string $table,array $data){}
public function delete(string $table,$data){}
public function add(array $data){}



} //END LOGIN MODEL
