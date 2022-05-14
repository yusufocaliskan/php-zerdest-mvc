<?php

namespace app\controllers;
use \framework\controller;

class users extends controller
{

    public function __construct()
    {

        //model'ı yükle
        //$this->model->load();
    }
    /**
     * Ana sayfa
     *
     * @return void
     */
    public function home()
    {
        echo "<h1>All Users</h1>";
    }

    public function create($param = false, $param2 = false)
    {
        echo $param2;
        echo 'Create';
      //$this->render('users/add_form', ['title'=>'Add new User']);
    }

    public function list()
    {
        //$all_users = $this->model->get()->all();
        
       // $this->render('users/list', ['title'=>'List of Users','all_users'=>$all_users]);
    }

}