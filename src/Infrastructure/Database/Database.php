<?php

declare(strict_types=1);

namespace MIS\Infrastructure\Database;

require_once "DatabaseConfig.php";
use PDO;

/**
 * Class Database
 * @package MIS\Infrastructure\Database
 */

final class Database
{
    private static ?PDO $_Instance = null;

    public function __construct()
    {
        self::$_Instance = new PDO(DNS,USERNAME,PASSWORD,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public static function getInstance():PDO
    {
       if(null === self::$_Instance){
           new self();
           return self::$_Instance;
       }
        return self::$_Instance;

    }
}
