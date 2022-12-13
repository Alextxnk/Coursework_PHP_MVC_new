<?php

namespace Database\Migrations;

class CreateLensTable
{
    public static function lensTable($table)
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS {$table}(
                id INT AUTO_INCREMENT PRIMARY KEY,
                model VARCHAR(255) NOT NULL,
                lens_type VARCHAR(255) NOT NULL,    
                min_distance VARCHAR(255) NOT NULL,
                max_distance VARCHAR(255) NOT NULL,
                cost VARCHAR(255) NOT NULL,
                thumbnail VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $stm = pdo()->prepare($query);
            $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}