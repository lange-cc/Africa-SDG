<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita16ffb18bbac1525e2fd1eff45673fe4
{
    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Detection' => 
            array (
                0 => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/namespaced',
            ),
        ),
    );

    public static $classMap = array (
        'Mobile_Detect' => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/Mobile_Detect.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInita16ffb18bbac1525e2fd1eff45673fe4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInita16ffb18bbac1525e2fd1eff45673fe4::$classMap;

        }, null, ClassLoader::class);
    }
}