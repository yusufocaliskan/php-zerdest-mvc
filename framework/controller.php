<?php

namespace framework;

class controller
{   
    /**
     * The model object
     *  
     * @var object
     */
    public $model;

    //Holds all the datas
    public $data = [];
    
    /**
     * Inisialiazing
     */
    public function __construct()
    {
        $this->model = new model();
    }

    /**
     * Rendering the view..
     */
    public function render($content, $data = array())
    {
        extract($data);

        require LAYOUT.'header.php';  
        require VIEWS.$content.'.php';
        require LAYOUT.'footer.php';
    }


    /**
     * Settin all the properties to the data array
     */
    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }

}