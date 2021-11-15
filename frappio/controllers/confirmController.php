<?php
namespace myFramework;

class confirmController extends PageController {

public function __construct()
{
  $model = $this->makeModel('confirmModel'); //makes a new confimModel
}

public function confirm($params)
{
  $view = $this->makeView('confirm');  //make the view for the confirmModel
  $model = $this->getModel(); //get the model
  $data=$model->delete(" ",$params); //delete the record by the params sent in Which will be the course_id
  $view->run(); //call the view to run the code .
}


}
