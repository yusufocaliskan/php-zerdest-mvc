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
        
        $this->connect = new PDO("mysql:host=localhost; dbname=book_store", 'root', 'Ma5ik33ysi45+');
        $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->connect)
        {
            die("Database bağlantı hatası.");
        }

        return $this->connect;
        
    }

 


}