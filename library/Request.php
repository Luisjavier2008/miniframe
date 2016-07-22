<?php

class Request {
    protected $url;
    private $controller;
    private $action;
    private $defaultController = 'home';
    private $defaultAction = 'index';
    private $params = array();

    public function __construct($url)
    {
        $this->url = $url;
        $segments = explode('/', $this->url);
        $this->resolverController($segments);
        $this->resolverAction($segments);
        $this->resolveParams($segments);
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

    public function resolveParams(&$segments){
        $this->params = $segments;
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
        return 'controllers/' . $this->getControllerClassName() . '.php';
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getActionMethodName()
    {
        return Inflector::lowerCamel($this->getAction() . 'Action');
    }
    
    public function getParams()
    {
        return $this->params;
    }

    public function execute()
    {
        $controllerClassName = $this->getControllerClassName();
        $controllerFileName = $this->getControllerFileName();
        $actionMethodName = $this->getActionMethodName();
        $params = $this->getParams();
        var_dump($controllerFileName);
        var_dump($actionMethodName);
        var_dump($params);
        echo "<h3>-------------------------------------------------------------------------------------</h3>";
        if(!file_exists($controllerFileName))
        {
            exit('Controller does not exist');
        }

        require $controllerFileName;
        $controller = new $controllerClassName();
        $controller->$actionMethodName();
    }
}