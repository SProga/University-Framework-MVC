<?php
namespace myFramework;

/*Factory method responsible for creating the appropriate
* model object for as well as the model view the page controller. also retuns the model object once created.*/

class PageController implements PageFactoryInterface {

	protected $view;
	protected $model;
	protected $role;
	protected $auth;
	protected $user;
	protected $validator;

	public function makeView($view_data) :View
	{
		$extension = "View";
		$viewObject = MYFRAMEWORK.$view_data.$extension; //atach the namepace to the className
		$this->view = new $viewObject($view_data); //Create a new view class object
		return $this->view;
	}

	public function makeModel(string $modelName)
	{
		$this->model = modelFactory::makeModel($modelName);
	}

	public function getModel( ): Model   //return the Modelobject 
	{

		return $this->model;

	}




} //END
