<?php

class database
{   

    
    public $connect;

    /**
     * Creates the connection
     *
     * @return object
     */
    public function connect()
    {
        
        $this->connect = new PDO(DB_ENGINE.":host=".HOST."; dbname=".DB_NAME, USER_NAME, USER_PASSWORD);
        $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->connect)
        {
            die("Database bağlantı hatası.");
        }

        return $this->connect;
        
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

        //  if($create->rowCout() > 0)
        //  {
        //      echo 'the database is created';
        //  }

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