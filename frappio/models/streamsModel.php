<?php

namespace myFramework;

class streamsModel extends Model {

 public function findAll(){

   $sql = $this->conn->prepare("SELECT stream_name,stream_image,instructor_name FROM
     streams,instructors,stream_instructor
     WHERE streams.stream_id = stream_instructor.stream_id
     AND instructors.instructor_id = stream_instructor.instructor_id");

   $this->result = $sql->execute();

   if (!$this->result)
   {
     die('There was an error running the query [' . $this->conn->error . ']');
   }
   if ($sql->rowCount() <= 0 )
   {
     $errors = Registry::get("validator");
     $errors->setError("Error finding streams");
     return FALSE;
   }
   else
   {
       return ($sql->fetchAll(\PDO::FETCH_ASSOC)); //fetch an associative array of the data;
   }



 }
 public function findOne(string $table,array $data){}
 public function update(string $table,array $data){}
 public function delete(string $table,$data){}
 public function add(array $data){}




}
