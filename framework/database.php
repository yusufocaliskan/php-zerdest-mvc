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

 


}