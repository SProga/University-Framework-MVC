<?php
namespace myFramework;

 // Data Access Class

  class Dbh  {


      private $conn;
      private static $_instance;
      private $dbhost ='localhost'; // Ip Address of database if external connection.
      private $dbuser='root'; // Username for DB
      private $dbpass='';// Password for DB
      private $dbname='framework'; // DB Name
      private $charset='utf8mb4';


    //  Get an instance of the Database
    //  @return Instance

      public static function getInstance(){
        if(!self::$_instance) {
              self::$_instance = new self();
           }
          return self::$_instance;
        }

      // Constructor

  private function __construct( ) {

        try{
        $dsn = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname.';charset='.$this->charset;
        $this->conn = new \PDO($dsn,$this->dbuser, $this->dbpass);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);


	// Error handling
}catch(\PDOException $e){
          die("Failed to connect to DB: ". $e->getMessage());
        }
      }
      // Magic method clone is empty to prevent duplication of connection
      private function __clone(){}

      // Get the connection
      public function getConnection(){
            return $this->conn;
      }
    }
