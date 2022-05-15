<?php

namespace framework;


class route extends framework{

    /**
     * Holds all object
     */
    public $all = [];

    public $router;

    public function __construct()
    {
        
    }

    /**
     * Sets new route
     */
    public function set($pattern, $controller, $method, $type)
    {
        return $this->all[]= [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method,
            'type' => $type,
        ];
        
    }

    //Post type
    public function post($pattern, $controller, $method)
    {
        $this->set($pattern, $controller, $method, 'POST');
    }

    //Get type
    public function get($pattern, $controller, $method)
    {
        $this->set($pattern, $controller, $method, 'GET');
    }

    //delete type
    public function delete($pattern, $controller, $method)
    {
        $this->set($pattern, $controller, $method, 'DELETE');
    }

    //put type
    public function put($pattern, $controller, $method)
    {
        $this->set($pattern, $controller, $method, 'PUT');
    }

    public function __destruct()
    {
        $this->router =  new router($this);
        $this->router->init();

    }
    
}