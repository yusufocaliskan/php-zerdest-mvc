<?php

namespace app\models;

use framework\model;

class users extends model
{   

    public $all; 
    
    public $bulk;
    

    public $database = 'zerdest';

    public $table = 'users';

    
    public function __construct()
    {
        parent::__construct();
        
        // $books = $this->DB->query("select * from books");
        // $books->execute();
        // $books->fetchAll();
        
        
        $this->bulk = new \MongoDB\Driver\BulkWrite;
    }

    public function list()
    {
        
        
        
        
        $data = ['_id' => new \MongoDB\BSON\ObjectID, 'name' => 'admin', 'password' => 'Ma5i2121'];
        $this->bulk->insert($data);
        //$bulk->update(['name' => 'Audi'], ['$set' => ['price' => 52000]]);
        //$bulk->delete(['name' => 'Hummer']);
        
        $this->DB->executeBulkWrite('zerdest.users', $this->bulk);

        
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