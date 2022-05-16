<?php

namespace framework\db;

class mongodb{



    public $connect; 

    /**
     * Creates the connection
     *
     * @return object
     */
    public function connect()
    {
        try {
            $this->connect = new \MongoDB\Driver\Manager('mongodb://127.0.0.1:'.$_ENV['DB_PORT'],[
                    //'username' => '',
                    //'password' => '',
                    'db'       => $_ENV['DB_NAME'],
    
            ]);
        } catch (\Exceptipn $e) {
            die($e->getMessage());
        }

        return $this->connect;
        
    }



}