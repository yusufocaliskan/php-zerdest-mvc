<?php

class controller
{   
    /**
     * Controllerin objesi
     *  
     * @var object
     */
    public $model;

    public $data = [];
    
    public function __construct()
    {
        $this->model = new model();
    }

    public function render($content, $data = array())
    {
        extract($data);

        require LAYOUT.'header.php';  
        require VIEWS.$content.'.php';
        require LAYOUT.'footer.php';
    }


    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }

}