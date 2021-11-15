<?php
namespace myFramework;

class profileModel extends Model
{
  protected static $data_file;
  protected $inventory = [];
  protected $result;



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
      else//if the user exists
      {
        return ($sql->fetchAll(\PDO::FETCH_ASSOC)); //fetch an associative array of the data;
      }



    }
    public function findOne(string $table,array $data)
    {
      $email = $data['email'];
      $course = $data[0]['course_id'];

      $sql = $this->conn->prepare("SELECT email , course_id FROM $table
        WHERE email = '$email'
        AND  course_id = '$course' ");

        $this->result = $sql->execute();

        if (!$this->result)
        {
          die('There was an error running the query [' . $this->conn->error . ']');
        }
        if ($sql->rowCount() != 1)//if the record doesn't exist
        {
          return false;
        }
        else
        {
          return true; //fetch an associative array of the data;
        }

      }

      public function add(array $data){

        $email = $data['email'];
        $course_id = $data[0]['course_id'];

        $sql = $this->conn->prepare("INSERT INTO user_courses VALUES(:email,:course_id)");

        $this->result = $sql->execute([
          'email' => $email,
          'course_id' => $course_id,
        ]);

        if (!$this->result)
        {
          die('There was an error running the query [' . $this->conn->error . ']');
        }


        if ($sql->rowCount() != 0 )
        {
          $errors = Registry::get("validator");
          $errors->setError("Error inputing courses");
          return FALSE;
        }
        else//if the user exists
        {
          return true ; //fetch an associative array of the data;
        }




      }

      public function update(string $table,array $data){}
        public function delete(string $table,$data){}


          public function findAll(){

            $user = Registry::get('user');
            $email = $user->getData('email');

            if(!empty($email))
            {
              $sql = $this->conn->prepare("SELECT course_id FROM user_courses WHERE email= '$email'");

              $this->result = $sql->execute( );

              if (!$this->result)
              {
                die('There was an error running the query [' . $this->conn->error . ']');
              }

              if ($sql->rowCount() < 0 )
              {
                $errors = Registry::get("validator");
                $errors->setError("No courses found");
                return FALSE;
              }
              else//if the user exists
              {
                return ($sql->fetchAll(\PDO::FETCH_ASSOC)); //fetch an associative array of the data;

              }
            } //end if
            else {
              $errors = Registry::get("Auth");
              $errors->setError("Must be Logged In to view Courses");
              return;
            }

          }



          public function findUserCourses(array $data) {

            if(empty($data))
            {

              $errors = Registry::get("Auth");
              $errors->setError("No Courses Exist Yet");
              return;
            }


            $user = Registry::get('user');
            $email = $user->getData('email');
            $course_id = $data[0]['course_id'];

            if(!empty($email))
            {
              $sql = $this->conn->prepare("SELECT courses.course_id , course_name , course_image , faculty_dept_name , instructor_name
                FROM courses ,users, user_courses,faculty_department , instructors , course_instructor , faculty_dept_courses
                WHERE courses.course_id = course_instructor.course_id
                AND faculty_dept_courses.course_id = courses.course_id
                AND course_instructor.instructor_id = instructors.instructor_id
                AND faculty_department.faculty_dept_id = faculty_dept_courses.faculty_dept_id
                AND users.email = user_courses.email
                AND user_courses.email = '$email'
                AND user_courses.course_id= courses.course_id ");

                $this->result = $sql->execute( );

                if (!$this->result)
                {
                  die('There was an error running the query [' . $this->conn->error . ']');
                }

                if ($sql->rowCount() < 0 )
                {
                  $errors = Registry::get("Auth");
                  $errors->setError("No courses Found");
                  return FALSE;
                }
                else//if the user exists
                {
                  return ($sql->fetchAll(\PDO::FETCH_ASSOC)); //fetch an associative array of the data;
                }
              }
              else{
                $errors = Registry::get("Auth");
                $errors->setError("You must be logged In to add Courses");
                }
            }



          } //END LOGIN MODEL
