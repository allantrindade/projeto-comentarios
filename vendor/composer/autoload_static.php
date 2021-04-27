<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46c0e4824fb7b8e27cc3a3d59c05ce89
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46c0e4824fb7b8e27cc3a3d59c05ce89::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46c0e4824fb7b8e27cc3a3d59c05ce89::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit46c0e4824fb7b8e27cc3a3d59c05ce89::$classMap;

        }, null, ClassLoader::class);
    }
}
