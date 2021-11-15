<?php
namespace myFramework;

interface ViewInterface {

public function setTemplateFile(string $tpl); //set the template file to be created
public function getdata ( ); 
public function getTemplateFile();
public function render();
public function addVars(string $name, $data);
public function setModel(Model $model);
public function getModel();

}
