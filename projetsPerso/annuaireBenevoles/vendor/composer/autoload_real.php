<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7658ef82f9f8095104c8b1d2b057cd03
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit7658ef82f9f8095104c8b1d2b057cd03', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7658ef82f9f8095104c8b1d2b057cd03', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7658ef82f9f8095104c8b1d2b057cd03::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
