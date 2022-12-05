<?php

namespace Database;

use PDO;

class Connection
{

    // Make PDO connection 
    public static function make($config)
    {
        try {
            return new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
