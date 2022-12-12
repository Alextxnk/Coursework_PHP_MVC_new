<?php

namespace Database\Migrations;

class CreateCameraTable
{
    public static function cameraTable($table)
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS {$table}(
                id INT AUTO_INCREMENT PRIMARY KEY,
                model VARCHAR(255) NOT NULL,
                matrix_resolution VARCHAR(255) NOT NULL,
                max_resolution VARCHAR(255) NOT NULL,
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