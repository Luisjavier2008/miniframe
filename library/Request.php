<?php

class Request {
    protected $url;
    private $controller;
    private $action;
    private $defaultController = 'home';
    private $defaultAction = 'index';
    public function __construct($url)
    {
        $this->url = $url;
        $segments = explode('/', $this->url);
        $this->resolverController($segments);
        $this->resolverAction($segments);
    }

    public function resolverController(&$segments)
    {
        $this->controller = array_shift($segments);

        if(empty($this->controller)){
            $this->controller = $this->defaultController;
        }
    }

    public function resolverAction(&$segments)
    {
        $this->action = array_shift($segments);

        if(empty($this->action)){
            $this->action = $this->defaultAction;
        }
    }
    public function getUrl()
    {
        return $this->url;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getControllerClassName()
    {
        return Inflector::camel($this->getController() . 'Controller');
    }


    public function getControllerFileName()
    {
        return 'controller/' . $this->getControllerClassName() . '.php';
    }

    public function getAction(){
        return $this->$action;
    }

    public function getActionName(){
        return '';
    }
}