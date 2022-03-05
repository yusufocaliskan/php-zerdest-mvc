<?php


class login_model extends model
{   

    public function __construct()
    {
        parent::__construct();
        
    }

    public function check($data)
    {   
        extract($data);
      
        $select = $this->DB->prepare("
            SELECT email, password 
            FROM users 
            WHERE email = '$email' AND password  = SHA1($password)
        ");

        $select->execute();
        $result = $select->fetch();
        return  $result;
    }


}