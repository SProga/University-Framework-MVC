<?php
namespace myFramework;
//the trait error handle functions listed below sets and gets any errors and sends them into the view to be displayed

trait ErrorHandler {

private $_errors = array();

public function setError($msg = " ")
{
  array_push($this->_errors,$msg) ;  //pushes an error message into the array
}

public function getErrors() :array  //returns any errors
{
    return $this->_errors;
}

public function clearErrors()  //clear any messages from within the error messages array
{
  $this->_errors[] = null;
}


}
