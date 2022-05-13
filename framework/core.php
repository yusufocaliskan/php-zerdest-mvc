<?php

class core{

    /**
     * url
     *
     * @var string
     */
    public $uri;

    /**
     * Controller path
     *
     * @var string
     */
    public $controller_path;

    /**
     * Controller
     *
     * @var object
     */
    public $controller;

    /**
     * Method   
     *
     * @var mixed
    */
    public $method;

    /**
     * parametre
     *
     * @var array
     */
    public $params;


    /**
     * name of the controller
     *
     * @var string
     */
    public static $controller_name;

    public function __construct()
    {   
       
    }

    
    /**
     * Run it..
     *
     * @return void
     */
    public function run()
    {
        //get the uri
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->uri = ltrim($this->uri, '/');
        $this->uri = rtrim($this->uri, '/');
        $this->uri = explode('/', $this->uri);

        //determine the Controller,  Method and parametre
        $this->controller = array_shift($this->uri);
        $this->method = array_shift($this->uri);
        $this->params = $this->uri;

        //get controller
        self::$controller_name = $this->controller;

        //Is there any controller
        if(empty($this->controller))
        {
            $this->controller = 'index'; 
        }

        //Inlude the controller file
       $this->controller_path = CONTROLLERS."$this->controller/".$this->controller."_controller.php";
        
        //Is there any controller
        if(!file_exists($this->controller_path))
        {  
            //No, show them a eror page.
            $this->_404();
        }
        
        //Call the class
        require $this->controller_path;
        $class_name = "$this->controller"."_controller";

        //Create the Instance of it.
        $this->controller = new $class_name;

        //Any method?
        if(!empty($this->method))
        {
            if(!method_exists($this->controller, $this->method))
            {
              $this->_404();  
            }

            call_user_func_array([$this->controller, $this->method], $this->params);
            //$this->controller->{$this->method}();
            exit();
        }


        call_user_func_array([$this->controller, 'home'], $this->params);
        exit();

    }


    /**
     * shows the error message
     *
     * @return void
     */
    private function _404()
    {
        require VIEWS.'errors/_404.php';
        exit;
    }

}