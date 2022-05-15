<?php

namespace framework;
use framework\database;
use framework\Router;

class model extends Database
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
    public function load($model_name)
    {   
        //prepare the path and the name
        $model_path = MODELS.$model_name.'.php';
        $model_name = "\app\models\\".$model_name;

        require $model_path;
        $this->model = new $model_name;
        
        //return it back
        return $this;
    }

    public function get()
    {
        return $this->model;
    }

}