<?php

namespace framework;

use App\Controllers\Index;

class router extends framework{


    /**
     * holds all the routes
     */
    public $routes = [];

    /**
     * controller paths
     */
    private $controler_path;

    /**
     * Controller object
     */
    private $controller;

    /**
     * Welcome default controller
     */
    private $wellcome_controller = [];
    
    public function __construct()
    {
        //Set the wellcome page
        //We will run it, when there is no any defined route as index.
        $this->wellcome_controller = $this->set('/',Index::class, 'home','GET');

       // Debug::pre($_SERVER);
        
    }

    public function init()
    {       
        //get the uri
        $uri = request::uri();
        $matched = [];
        foreach($this->routes as $route)
        {
            
            //Route
            $route['pattern'] = $this->_clear_pattern($route['pattern']); 
            $uri = $this->_clear_uri(request::uri());

            //prepare for matching.
            $route_exp = explode('/',$route['pattern']);
            $pattern = implode('/',array_slice($route_exp,0,2));
            
            $uri_exp = explode('/',$uri);
            $uri = implode('/',array_slice($uri_exp,0,2));

            //Is there any matching things?
            if($pattern == $uri)       
            {
                $matched = $route;
                
                $uri = explode('/', request::uri());
                $controller = array_shift($uri);
                $method = array_shift($uri);
                $params = $uri;

                //set and remove the empty arrays.  
                $matched['params'] = array_filter($params);
                
            }

           
        }

        //Is there any mathed routed?
        if(empty($matched))
        {
            //no? Show her an error page...
            Notice::_404();
        }

        //Route
        $matched['pattern'] = $this->_clear_pattern($matched['pattern']); 

        //uri
        $uri = $this->_clear_uri(request::uri());
     
        
        //Generat the controller path and require it
        $this->controler_path = $matched['controller'].'.php';
        $this->controler_path = str_replace('\\','/', $this->controler_path);
        $this->controler_path = strtolower($this->controler_path);
        
        //is it the right request mrthod?
        if(request::method() != $matched['type'])
        {   
            throw new \Exception("Bad request type.", 1);
            
        }

        //Require the controller
        require_once $this->controler_path;

        //Create instance of it
        $this->controller = new $matched['controller'];
        call_user_func_array([$this->controller, $matched['method']],$matched['params']);

        //Exit;
        exit;
    }



    /**
     * Sets new route
     */
    public function set($pattern, $controller, $method, $type)
    {
        return $this->routes[]= [
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

    /**
     * Making some clean things..
     */
    private function _clear_pattern($uri)
    {
        return $this->_clear_uri($uri);
    }

    private function _clear_uri($uri)
    {
        $uri = rtrim($uri,'/');
        $uri = ltrim($uri,'/');
        return $uri;

    }
    
    //Debuginns
    public function __destruct()
    {
        $this->init();        
       // Debug::pre($this->routes);
    }

    

}