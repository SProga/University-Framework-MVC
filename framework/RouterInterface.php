<?php
namespace myFramework;

interface RouterInterface
{
    public function setAction($action);
    public function setParams(array $params);
    public function setController($controller);
    public function parseUri();

}
