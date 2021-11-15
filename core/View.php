<?php
namespace myFramework;

class View implements ViewInterface {


  protected $header = 'header.tpl.php'; //points to the header portion of the tpl file
  protected $footer = 'footer.tpl.php'; //points to the footer portion of the tpl file
  protected $tpl_file;  //this will hold the name of the tpl file to open which is also the body of the webpage
  protected $view_data;  //this will hold the data to pass to the view file
  protected $model;  //give the view the ability to interact with the model
  protected $vars = array();

  public function __construct($viewfile)  //whenever you want to create a view have to pass view file and data
  {
    $this->tpl_file = $viewfile;  //this the name of the file to be created
    $this->setTemplateFile($this->tpl_file);   //TemplateFunction to store the set the template file before passing it to render Function();
  }

  //public function setVar($name,$var);

  public function setTemplateFile(string $tpl)
  {
    if(file_exists(VIEWS_DIR.DS.$this->tpl_file."View.php"))
    {
      $extension = ".tpl.php";
      $this->tpl_file = TPL_TEMPLATES.$tpl.$extension;
    }
    else
    {
      trigger_error("Error templateFile not found ",E_USER_ERROR);
    }

  }

public function setData($viewdata = [])    //this is function to set Query data which will be eventually sent to the tpl file
{
    $this->view_data = $viewdata;
}


  public function getdata ( )  //get Any data that was set
  {
    return $this->view_data;
  }


  public function getTemplateFile()
  {
    return $this->tpl_file;
  }

  //public function setPlugins($plugins);


  public function render()
  {
    extract($this->vars);
    include TPL_TEMPLATES.DS.$this->header;
    include $this->getTemplateFile();
    include TPL_TEMPLATES.DS.$this->footer;
  }


  public function addVars(string $name , $data)
  {
    if(is_object($data))   //if the data is an object then fetch() the data .
    {
      $this->vars[$name] = $data->fetch();

    }
      $this->vars[$name] = $data ;  //else just assign the data to the array.
    }



  public function makeModel(string $model)
  {
    $modelObjClass = empty($model) ? strreplace("View", "Model", __CLASS__) : $model ;
		$this->model = ModelFactory::makeModel($modelObjClass);
  }

  public function setModel(Model $model)
  {
    $this->model = $model;
  }

 public function getModel()
{
  return $this->model;
}


}
