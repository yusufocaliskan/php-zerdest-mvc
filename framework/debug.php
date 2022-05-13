<?php

namespace framework;

class debug extends framework{    

    /**
     * Displaying array, object 
     * in between pre tags
     */
    public static function pre($data)
    {
        echo '<pre>';
           print_r($data);
        echo '</pre>';
    }

    /**
     * Displaying array, object 
     * in between pre tags
     */
    public static function dump($data)
    {
        echo '<pre>';
           var_dump($data);
        echo '</pre>';
    }
    

}