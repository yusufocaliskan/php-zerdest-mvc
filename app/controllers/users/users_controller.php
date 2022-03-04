<?php

class users_controller extends controller
{

    public function __construct()
    {
        parent::__construct();

        //model'ı yükle
        $this->model->load();
    }
    /**
     * Ana sayfa
     *
     * @return void
     */
    public function home()
    {
        echo "<h1>Tüm Kullanıcılar..</h1>";
    }

    public function add_form($param = false)
    {
        
      $this->render('users/add_form', ['title'=>'Yeni Kullanıcı Ekle']);
    }

    public function list()
    {
        $all_users = $this->model->get()->all();
        
        $this->render('users/list', ['title'=>'Kullanıcı Listesi','all_users'=>$all_users]);
    }


    

   

}