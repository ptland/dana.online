<?php

namespace App\Model\Data;

class DatabaseUtils {

    public static $dns = "mysql:host=localhost;dbname=mvcprojectdemo";
    public static $username = 'root';
    public static $password = '';

    public static function connect() {
        $options = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);

        $db = new \PDO( self::$dns, self::$username, self::$password, $options);

        $db->query("SET NAMES utf8");
        
        return $db;
    }

}
