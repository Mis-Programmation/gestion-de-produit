<?php


namespace MIS\Infrastructure\Service;


use Slim\Flash\Messages;

class SessionAuth
{


    public static function get(string $key)
    {
        return isset( $_SESSION[$key]) ?   $_SESSION[$key]  : null ;
    }

    /**
     * @param string $key
     */
    public static function remove(string $key):void
    {
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    /**
     * @param string $key
     * @param $value
     */
    public static function add(string $key,$value)
    {
        $_SESSION[$key] = $value;
    }

}
