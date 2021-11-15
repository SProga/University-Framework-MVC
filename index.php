<?php
namespace myFramework;
require("data/config.php");


$controller= new FrontController;
$controller->init();
$controller->run();
