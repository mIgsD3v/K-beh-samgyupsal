<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite12d56d840bc2e53c427313b3274e75d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite12d56d840bc2e53c427313b3274e75d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite12d56d840bc2e53c427313b3274e75d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite12d56d840bc2e53c427313b3274e75d::$classMap;

        }, null, ClassLoader::class);
    }
}
