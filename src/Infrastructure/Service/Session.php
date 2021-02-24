<?php


namespace MIS\Infrastructure\Service;


use Slim\Flash\Messages;

class Session
{

    /**
     * @param string $key
     * @return mixed
     */
    static private ?Messages $session = null;

    private function __construct()
    {
        self::$session = new Messages();
    }

    public static function getSession()
    {
        if(is_null(self::$session)){
            new self();
        }
        return self::$session;
    }

    public static function get(string $key)
    {
        return isset(self::getSession()->getMessage($key)[0]) ? self::getSession()->getMessage($key)[0] : '' ;
    }


    /**
     * @param string $key
     * @param $value
     */
    public static function add(string $key,$value)
    {
        self::getSession()->addMessage($key,$value);
    }

}
