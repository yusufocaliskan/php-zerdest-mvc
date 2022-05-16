<?php

namespace framework;

use framework\notice;
use \framework\framework;

class database extends framework
{   

    
    public $connection;

    public function init()
    {
        
        $database_engine = $_ENV['DB_ENGINE'];
        
        
        switch($database_engine)
        {
            case 'mysql':
                $mysql = new db\mysql;
                $this->connection = $mysql->connect();
            break;

            case 'mongodb':
                
                $mongodb = new db\mongodb;
                $this->connection = $mongodb->connect();
            break;

            default:
            
                $mysql = new db\mysql;
                $this->connection = $mysql->connect();
            break;

        }
        
        return $this->connection;
        
    }




    /**
     * Create a database
     *
     * @param string $database_name
     * @return void
     */
    public function create_new_database($database_name = 'zerdest_fr')
    {
        if(empty($database_name))
        {
            echo 'bir database adı gir';
            exit;
        }

        $create = $this->connect->prepare("CREATE DATABASE IF NOT EXISTS $database_name");
        $create->execute();

    }


    /**
     * Create the user table
     *
     * @param string $database database ismi
     * @return void
     */
    public function create_user_table($database)
    {
        //Önce database'i seç
        $change_database = $this->connect->query("USE $database");
        $change_database->execute();
        
        //Sonra sorguyu yap
        $create = $this->connect->prepare("
            CREATE TABLE users (
                userId INT(225) UNSIGNED NOT NULL AUTO_INCREMENT,
                name  VARCHAR(100),
                email VARCHAR(100),
                password VARCHAR(225),
                image_link VARCHAR(225),
                PRIMARY KEY (userId)
            )
        ");

        $create->execute();
        
    }

    /**
     * Ceate a new admin
     *
     * @return void
     */
    public function insert_default_admin()
    {
   
        $create = $this->connect->prepare("INSERT INTO users
                            (name, email, password, image_link ) 
                            VALUES ('admin', 'admin@zerdest.ku', SHA1('2121'), 'default-admin.png' )
                        
                        ");
        
        $create->execute();

    }

 


}