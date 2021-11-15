<?php
namespace myFramework;

class coursesModel extends Model
{
  protected static $data_file;
  protected $inventory = [];
  protected $result;


public function findOne(string $table,array $data){

  $courseid = $data['course_id'];
  $courseName= $data['course_name'];
  $courseDes = $data['course_description'];
  $courseCount = $data['course_recommendation_count'];
  $courseAccessCount = $data['course_access_count'];
  $courseImage = $data['course_image'];



  $sql = $this->conn->prepare("SELECT  course_id , course_name , course_description ,course_recommendation_count ,course_access_count,course_image
          FROM $table
          WHERE course_id = '$courseid';");


  $this->result = $sql->execute();

  if (!$this->result)
  {
    die('There was an error running the query [' . $this->conn->error . ']');
  }


  if ($sql->rowCount() != 1 )//if the course doesn't exist
  {
    $errors = Registry::get("validator");
    $errors->setError("The course was not found");
    return FALSE;
  }
  else//if the course exists
  {
    return ($sql->fetch(\PDO::FETCH_ASSOC)); //fetch an associative array of the data;
  }
}

public function findAll()
{

   $sql = $this->conn->prepare("SELECT courses.course_id , course_name , course_image , faculty_dept_name , instructor_name FROM courses , faculty_department , instructors , course_instructor , faculty_dept_courses
    WHERE courses.course_id = course_instructor.course_id
    AND faculty_dept_courses.course_id = courses.course_id
    AND course_instructor.instructor_id = instructors.instructor_id
    AND faculty_department.faculty_dept_id = faculty_dept_courses.faculty_dept_id ");

  $this->result = $sql->execute();



  if (!$this->result)
  {
    die('There was an error running the query [' . $this->conn->error . ']');
  }


  if ($sql->rowCount() <= 0 )
  {
    $errors = Registry::get("validator");
    $errors->setError("Error finding courses");
    return FALSE;
  }
  else//if the course exists
  {
      return ($sql->fetchAll(\PDO::FETCH_ASSOC)); //fetch an associative array of the data;
  }

}

public function findOneRecord($data){

  $sql = $this->conn->prepare("SELECT course_name ,courses.course_id, course_image , faculty_dept_name , instructor_name FROM courses , faculty_department , instructors , course_instructor , faculty_dept_courses
    WHERE courses.course_id = course_instructor.course_id
    AND faculty_dept_courses.course_id = courses.course_id
    AND course_instructor.instructor_id = instructors.instructor_id
    AND faculty_department.faculty_dept_id = faculty_dept_courses.faculty_dept_id
    AND courses.course_id = $data ");

    $this->result = $sql->execute();

    if (!$this->result)
    {
      die('There was an error running the query [' . $this->conn->error . ']');
    }


    if ($sql->rowCount() <= 0 )
    {
      $errors = Registry::get("validator");
      $errors->setError("Error finding courses");
      return FALSE;
    }
    else//if the course exists
    {
      return ($sql->fetchAll(\PDO::FETCH_ASSOC)); //fetch an associative array of the data;
    }

  }



public function update(string $table,array $data){}

public function delete(string $table,$data){

  $sql = $this->conn->prepare(" ");

    $this->result = $sql->execute();

    if (!$this->result)
    {
      die('There was an error running the query [' . $this->conn->error . ']');
    }


    if ($sql->rowCount() <= 0 )
    {
      $errors = Registry::get("validator");
      $errors->setError("Error finding courses");
      return FALSE;
    }
    else//if the course exists
    {
      return true; //fetch an associative array of the data;
    }

}

public function add(array $data){}



} //END LOGIN MODEL
