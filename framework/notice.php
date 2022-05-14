<?php

namespace framework;

class notice extends framework{

    public static function _404()
    {
        echo '404 | Not Found';
    }

    public static function database_connection_error()
    {
        die( 'There is no database connection!' );
    }
}