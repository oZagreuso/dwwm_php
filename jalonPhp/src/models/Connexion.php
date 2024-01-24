<?php

namespace App\models;

class Connexion
{
    private static $connexion = null;
    private static string $host = 'localhost';
    private static string $user = 'root';
    private static string $pass = '';
    private static string $base = 'db_cpu';

    private function __construct()
    {
    
    }

    public static final function getInstance()
    {
        
        if (is_null(self::$connexion))
        {
            
            try 
            {
                self::$connexion = new \PDO('mysql:host=' . self::$host . ';dbname=' . self::$base, self::$user, self::$pass, array(\PDO::ATTR_DEFAULT_FETCH_MODE =>\PDO::FETCH_ASSOC, \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            } catch (\PDOException $e)
            {
                die(" -- Database connexion failed -- " . $e ->getMessage());
            }
          
        }
        return self::$connexion;
    }
}