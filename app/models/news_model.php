<?php

class news_model extends model
{   

    public function __construct()
    {
        parent::__construct();
        
        // $books = $this->DB->query("select * from books");
        // $books->execute();
        // $books->fetchAll();
        
    }

    public function all()
    {

        
        $all_users = [
            0 => [
                'userId'=>1,
                'user_name'=>'admin',
                'user_password'=>'test123',
                'user_email'=>'admin@gmail.com',
            ],
             1 => [
                'userId'=>2,
                'user_name'=>'admin',
                'user_password'=>'test123',
                'user_email'=>'test@gmail.com',
             ],
             2 => [
                'userId'=>3,
                'user_name'=>'admin',
                'user_password'=>'admin2121',
                'user_email'=>'kedddyy@gmail.com',
            ]
        ];

        return $all_users;
    }
}