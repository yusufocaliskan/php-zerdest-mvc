<?php

namespace app\controller;

use \framework\controller;

class test2 extends controller
{

    public function __construct()
    {
        //parent::__construct();

    }

    public function home()
    {

      $this->render('test2/home'); 
    }

    public function add()
    {
        //
    }

    public function delete()
    {
        //
    }


    public function edit()
    {
        //   
    }

}