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

    private $wellcom_controller = [];
    
    public function __construct()
    {
        //Set the wellcome page
        //We will run it, when the is no any defined route as index.
        $this->wellcom_controller = $this->set('/',Index::class, 'home','get');

       // Debug::pre($_SERVER);
        
    }

    public function init()
    {       
        //get the uri
        $uri = request::uri();
        
        foreach($this->routes as $route)
        {
            //Route
            $route['pattern'] = rtrim($route['pattern'],'/');
            $route['pattern'] = ltrim($route['pattern'],'/');

            //uri
            $uri = request::uri();
            $uri = rtrim($uri,'/');
            $uri = ltrim($uri,'/');
            
            if($route['pattern'] == $uri)       
            {  

                //Generat the controller path and require it
                $this->controler_path = $route['controller'].'.php';
                $this->controler_path = str_replace('\\','/', $this->controler_path);
                $this->controler_path = strtolower($this->controler_path);
                

                //Require the controller
                require_once $this->controler_path;

                //Create instance of it
                $this->controller = new $route['controller'];
                call_user_func_array([$this->controller, $route['method']],[]);
                exit;
                
            }
            
            
           
        }
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
        $this->set($pattern, $controller, $method, 'post');
    }

    //Get type
    public function get($pattern, $controller, $method)
    {
        $this->set($pattern, $controller, $method, 'get');
    }

    //delete type
    public function delete($pattern, $controller, $method)
    {
        $this->set($pattern, $controller, $method, 'delete');
    }

    //put type
    public function put($pattern, $controller, $method)
    {
        $this->set($pattern, $controller, $method, 'put');
    }
    
    //Debuginns
    public function __destruct()
    {
        $this->init();        
       // Debug::pre($this->routes);
    }

    

}