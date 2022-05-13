<?php

namespace app\controllers;

class login extends controller
{

    public function __construct()
    {
        parent::__construct();

        //Model
        $this->model->load();
    }

    public function home()
    {

      $this->render('login/home'); 
    }

    public function enter()
    {

       $check = $this->model->get()->check($_POST);
        if(!empty($check))
        {
            echo "Giriş yaptın";
            exit;
        }
        echo "Hata: bir şey yalnış.";
    }
  

}