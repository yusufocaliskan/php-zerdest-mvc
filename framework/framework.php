<?php

namespace framework;

class framework{

    /**
     * All the variables are being saved 
     * in the array 
     */
    protected $vars = [];

    public function __set($key, $val)
    {
        $this->vars[$key] = $val;
    }

    public function __get($param)
    {
        return $this->vars[$param];
    }

}