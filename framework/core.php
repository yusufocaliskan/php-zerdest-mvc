<?php

class Core{

    /**
     * url
     *
     * @var string
     */
    public $uri;

    /**
     * Controller yolu
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
     * controller adı
     *
     * @var string
     */
    public static $controller_name;

    public function __construct()
    {   
       
    }

    
    /**
     * Çalıştır..
     *
     * @return void
     */
    public function run()
    {
        //url all
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->uri = ltrim($this->uri, '/');
        $this->uri = rtrim($this->uri, '/');
        $this->uri = explode('/', $this->uri);

        //Controller / Method ve parametreleri belirle..
        $this->controller = array_shift($this->uri);
        $this->method = array_shift($this->uri);
        $this->params = $this->uri;

        //controller adı
        self::$controller_name = $this->controller;

        //Controller var mı?
        if(empty($this->controller))
        {
            $this->controller = 'index'; 
        }

        //Controller: Dosyayı çek
       $this->controller_path = CONTROLLERS."$this->controller/".$this->controller."_controller.php";
        
        //controller dosyası var mı?
        if(!file_exists($this->controller_path))
        {
            $this->_404();
        }
        
        //Classı çağır
        require $this->controller_path;
        $class_name = "$this->controller"."_controller";

        //Instance oluştur.
        $this->controller = new $class_name;

        //Method var mı?
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
     * Hata sayfasını gösrir
     *
     * @return void
     */
    private function _404()
    {
        require VIEWS.'errors/_404.php';
        exit;
    }

}