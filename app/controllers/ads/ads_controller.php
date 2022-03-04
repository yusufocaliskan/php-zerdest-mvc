<?php


class ads_controller extends controller
{

    public function __construct()
    {
        parent::__construct();

        //Model
        $this->model->load();
    }

    public function home()
    {

      $this->render('ads/home'); 
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