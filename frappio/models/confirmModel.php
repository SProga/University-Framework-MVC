<?php
namespace myFramework;


class confirmModel extends Model
{

  public function delete(string $table,$id)
  {

    $user = Registry::get('user');
    $email = $user->getData('email');

    if(!empty($email))
    {
      $sql = $this->conn->prepare("DELETE FROM user_courses WHERE email='$email' AND user_courses.course_id=$id");

      $this->result = $sql->execute( );

      if (!$this->result)
      {
        die('There was an error running the query [' . $this->conn->error . ']');
      }

      if ($sql->rowCount() != 1) //if the course doesn't exist
      {
        $errors = Registry::get("validator");
        $errors->setError("Course was not Deleted");
        return FALSE;
      }
      else//if the course exists
      {
        return true; //return true;
      }
    } //end if
    else {
      $errors = Registry::get("Auth");
      $errors->setError("Must be Logged In to delete a course");
      return;
    }




  }








/* BOILER PLATES   */
 public function findAll(){}
 public function findOne(string $table,array $data){}
 public function update(string $table,array $data){}
 public function add(array $data){}
/* END BOILER PLATES */





}
