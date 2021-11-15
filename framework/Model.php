<?php
namespace myFramework;


abstract class Model
{

 protected $conn;
 protected $db;


public function __construct()
{
  $this->db = Dbh::getInstance();
  $this->conn = $this->db->getConnection();
}
   abstract public function findAll();
   abstract public function findOne(string $table,array $data);
   abstract public function update(string $table,array $data);
   abstract public function delete(string $table,$data);
   abstract public function add(array $data);

}
