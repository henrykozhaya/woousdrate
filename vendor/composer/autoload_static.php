<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita85de67ec5142d87c2477fffc6a641a2
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LogicInc\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LogicInc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita85de67ec5142d87c2477fffc6a641a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita85de67ec5142d87c2477fffc6a641a2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita85de67ec5142d87c2477fffc6a641a2::$classMap;

        }, null, ClassLoader::class);
    }
}
