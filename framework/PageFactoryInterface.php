<?php
//abstract factory to create A PageController;

namespace myFramework;

interface PageFactoryInterface
{

 public function makeView($view_data);
 public function makeModel(string $modelName);

}
