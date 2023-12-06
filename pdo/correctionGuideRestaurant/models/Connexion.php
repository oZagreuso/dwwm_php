<?php

class Connexion
{
    private static $connection = null;
    private static string $host = 'localhost';
    private static string $user = 'root';
    private static string $pass = '';
    private static string $base = 'guide';

    private function __construct()
    {
        // pas de constructeur, il s'agit d'un singleton
    }

    public static final function getInstance()
    //static -> permet d'appeler la méthode sans instancier d'objet -> Connexion::
    //final -> on ne peut pas en hériter
    {
        //on vérifie si l'instance existe ou non 
        if (is_null(self::$connection))
        {
            //on fait un try catch au cas ou la connetion échoue
            try 
            {
                self::$connection = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$base, self::$user, self::$pass, array(PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_NUM, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                // PDO:: ATTR_DEFAULT_FETTCH_MODE -> façon dont je veux récupérer le résultat 
                // => PDO:: FETCH_ASSOC -> par nom de colonne
                // => PDO:: FETCH_BOTH -> par numéro ET nom de colonne
                // => PDO:: FETCH_NUM -> par numéro de colonne
                // => PDO:: FETCH_OBJ -> récupération par objet (récupération d'un JSON c'est une récupération d'objets litéraux)
            } catch (PDOException $e)
            {
                die("Dtabase connection failes" . $e ->getMessage());
            }
          
        }
        return self::$connection;
    }
}