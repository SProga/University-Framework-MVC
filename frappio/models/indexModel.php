<?php

namespace myFramework;

class indexModel extends Model {

 public function findAll(){

   $sql = $this->conn->prepare("SELECT courses.course_id , course_name ,course_recommendation_count,
      course_image ,course_access_count, faculty_dept_name , instructor_name FROM courses , faculty_department , instructors , course_instructor , faculty_dept_courses
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
 public function findOne(string $table,array $data){}
 public function update(string $table,array $data){}
 public function delete(string $table,$data){}
 public function add(array $data){}

}
