<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit268e12be249badfaf58bae2c56611474
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit268e12be249badfaf58bae2c56611474::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit268e12be249badfaf58bae2c56611474::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit268e12be249badfaf58bae2c56611474::$classMap;

        }, null, ClassLoader::class);
    }
}