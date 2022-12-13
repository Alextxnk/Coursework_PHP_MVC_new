<?php

namespace Database\Migrations;

class CreateFlashTable
{
    public static function flashTable($table)
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS {$table}(
                id INT AUTO_INCREMENT PRIMARY KEY,
                model VARCHAR(255) NOT NULL,
                flash_type VARCHAR(255) NOT NULL,
                cameras VARCHAR(255) NOT NULL,
                display VARCHAR(255) NOT NULL,
                zoom VARCHAR(255) NOT NULL,
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