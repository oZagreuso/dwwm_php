<?php

namespace app;

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

   static function autoload($class)
   {
    if (strpos($class, __NAMESPACE__ . '\\') === 0)
    {
        $class = str_replace(__NAMESPACE__ . '\\', "", $class);
        require 'models/' . $class . '.php';
    }

   } 
}