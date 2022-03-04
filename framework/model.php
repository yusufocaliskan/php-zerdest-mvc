<?php

class model
{   

    /**
     * Database bağlantıs
     *
     * @var object
     */
    public $DB;

    public function __construct()
    {   
        //Bağlantıyı yap
        $database = new database();
        $this->DB = $database->connect();
    }

    /**
     * Model objesini tutar
     *
     * @var object
     */
    private $model; 

    /**
     * Yeni bir model
     *
     * @param string $model_name
     * @return object
     */
    public function load()
    {   
        $model_name = Core::$controller_name;

        $model_name = $model_name.'_model';
        require MODELS.$model_name.'.php';
        
        $this->model = new $model_name();
        return $this;
    }

    public function get()
    {
        return $this->model;
    }

}