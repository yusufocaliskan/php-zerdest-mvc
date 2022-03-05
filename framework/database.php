<?php

class database
{   

    
    public $connect;

    /**
     * Bağlantıyı yapar.
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
     * Database i oluştur.
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
        //      echo 'database oluşturuldu';
        //  }

    }


    /**
     * Kullanıcı tablosu ıoluştur..
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
     * Yeni bir admi ekle
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