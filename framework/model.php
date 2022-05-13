<?php

class model
{   

    /**
     * Database connection
     *
     * @var object
     */
    public $DB;

    public function __construct()
    {   
        //Provide the connection
        $database = new database();
        $this->DB = $database->connect();
    }

    /**
     * Holds the model object
     *
     * @var object
     */
    private $model; 

    /**
     * A new model
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