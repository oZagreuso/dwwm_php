<?php
// PDO = PHP Data Object
class Connexion
{
    private static $connection = null;
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $base = 'exo_8_avions';    

    private function __construct()
    {

    }

    static public final function getInstance()
    {
        // final -> on ne peut pas hériter de la classe
        if(is_null(self::$connection))
        // on verifier si l'instance existe
        {
            try{
                self::$connection = new PDO('mysql:host='.self::$host.';dbname='.self::$base, self::$user, self::$pass, 
                array(PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
            }
            catch(PDOException $e){
                die("Database connection failed".$e->getMessage());
            }            
        }

        return self::$connection;
    }   
}