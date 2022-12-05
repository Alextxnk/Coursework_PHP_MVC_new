<?php

namespace App\Core;

class App
{
    // Static key 
    protected static $registry;

    // Bind config info 
    public static function bind($key, $configArr)
    {
        static::$registry[$key] = $configArr;
    }

    // Get config info
    public static function get($key)
    {
        return static::$registry[$key];
    }
}
