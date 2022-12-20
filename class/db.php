<?php

include("config.php");

class connection{
    private static $pdo;
    public static function conn(){
        try{
          self::$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);  
        }catch(Exception $e){
           $e->getMessage();
        }
        return self::$pdo;
    }

    public static function Fetching($sql){
     return self::conn()->prepare($sql);
    }
}

?>