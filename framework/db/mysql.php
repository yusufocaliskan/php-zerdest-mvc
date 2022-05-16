<?php

namespace framework\db;
use framework\notice;

class mysql{


    /**
     * Creates the connection
     *
     * @return object
     */
    public function connect()
    {
        
        try {
            //code...
            $this->connect = new \PDO($_ENV['DB_ENGINE'].":host=".$_ENV['HOST']."; dbname=".$_ENV['DB_NAME'], $_ENV['USER_NAME'], $_ENV['USER_PASSWORD']);
            $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
        } catch (\PDOException $e) {
            notice::database_connection_error();
        }

        return $this->connect;
        
    }

}