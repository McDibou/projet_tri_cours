<?php

namespace Adrien;

class Autoloader
{
    static function registre()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__) === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            require __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
        }
    }
}