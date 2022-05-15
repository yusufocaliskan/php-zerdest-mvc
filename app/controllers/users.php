<?php

namespace app\controllers;
use \framework\controller;
use \framework\debug;

class users extends controller
{

    public $user_model;

    public function __construct()
    {

        parent::__construct();

        //Load the model
        $this->user_model = $this->model->load('users')->get();
    }
    /**
     * Home page
     *
     * @return void
     */
    public function home()
    {
        echo "<h1>All Users</h1>";
    }

    public function create($param = false, $param2 = false)
    {
      $this->render('users/add_form', ['title'=>'Add new User']);
    }

    public function list()
    {
       $all_users = $this->model->get()->all();
        
       $this->render('users/list', ['title'=>'List of Users','all_users'=>$all_users]);
    }

}