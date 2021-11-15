<?php
namespace myFramework;


class signupModel extends Model {

  protected $result;

  public function add(array $data){

    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $retypedPwd = $data['retypedPwd'];

    $validator = Registry::get("validator");
    $role = 'user'; //once the person signs up make them a default user only the admin can change the privilages

    if(!empty($email))
    {
      if(!$validator->isEmailValid($email))
      {
        $validator->setError("Error! Email Invalid");
      }

    }  //if the email is not empty
    else{
      $validator->setError("Error! Email empty");
    }

    if(!empty($password))
    {
      if(!$validator->isPasswordValid($password))
      {
        $validator->setError("Error! password Invalid");
      }
    }
    else{
      $validator->setError("Error! password empty");
    }

    if(!empty($retypedPwd))
    {
      if($validator->passwordMatch($password,$retypedPwd == false))
      {
        $validator->setError("Error! password does not match");
      }
    }
    else
    {
      $validator->setError("Error! retyped password empty");
    }

    if($validator->isEmailValid($email) && $validator->isPasswordValid($password) && $validator->passwordMatch($password,$retypedPwd))
    {

      if($this->findOne('users',$data) == false )
      {
        $sql = $this->conn->prepare("INSERT INTO users(name, email , password,role) VALUES ('$name','$email','$password','$role')");

        $this->result = $sql->execute();

        if (!$this->result)
        {
          die('There was an error running the query [' . $this->conn->error . ']');
        }
        else {
          header('Location: ../login');
        }
      }
    } //end validation of email password and passwordMatch
  } //end function



  public function findOne(string $table, array $data){

    $email = $data['email'];

    $sql = $this->conn->prepare("SELECT  email
      FROM $table
      WHERE email = '$email' ");

      $this->result = $sql->execute();

      if (!$this->result)
      {
        die('There was an error running the query [' . $this->conn->error . ']');
      }


      if ($sql->rowCount() != 1)//if the user doesn't exist
      {
        return FALSE;
      }
      else//if the user exists
      {
        $validator = Registry::get('validator');
        $validator->setError("Error! This email is already being used ");
        return TRUE;
      }
    }





    public function findAll(){}
        public function update(string $table,array $data){}
          public function delete(string $table,$data){}

          }//end class
