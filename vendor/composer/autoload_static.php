<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc1f39d425b5e7401aebe94dc49f08b44
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CrudPoo\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CrudPoo\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc1f39d425b5e7401aebe94dc49f08b44::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc1f39d425b5e7401aebe94dc49f08b44::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc1f39d425b5e7401aebe94dc49f08b44::$classMap;

        }, null, ClassLoader::class);
    }
}
