<?php

namespace framework;

class notice extends framework{

    /**
     * Error page
     */
    public static function _404()
    {
        http_response_code(404);
        require ERROR.'404.php';
        exit;
    }

    public static function database_connection_error()
    {
        die( 'There is no database connection!' );
    }
}