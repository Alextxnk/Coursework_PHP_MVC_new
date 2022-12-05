<?php

use App\Core\App;
use Database\Connection;

// PDO Connection 
if (!function_exists('pdo')) {
    function pdo()
    {
        App::bind('config', require 'config.php');

        return Connection::make(App::get('config')['database']);
    }
}

// Die and dump 
if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        die(var_dump($data));
        echo '</pre>';
    }
}

// Return view 
if (!function_exists('view')) {
    function view($view, $data = null)
    {
        if ($data != null) {
            extract($data);
        }

        require "views/{$view}.view.php";
    }
}

// Redirect to path 
if (!function_exists('redirect')) {
    function redirect($path)
    {
        return header("Location: /{$path}");
    }
}

// Public dir 
if (!function_exists('publicDir')) {
    function publicDir()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/public/';
    }
}

// Session start 
if (!function_exists('sesstionStart')) {
    function sesstionStart()
    {
        ob_start();
        session_start();
    }
}

// Session set 
if (!function_exists('sessionSet')) {
    function sessionSet($name, $value)
    {
        $_SESSION[$name] = $value;
    }
}

// Session get 
if (!function_exists('sessionGet')) {
    function sessionGet($name)
    {
        return ucwords($_SESSION[$name]);
    }
}

// Session unset 
if (!function_exists('sessionUnset')) {
    function sessionUnset($name)
    {
        unset($_SESSION[$name]);
    }
}

// if (!function_exists('faker')) {
//     function faker()
//     {
//         $facker = Faker\Factory::create();
//         return $facker->name();
//     }
// }
