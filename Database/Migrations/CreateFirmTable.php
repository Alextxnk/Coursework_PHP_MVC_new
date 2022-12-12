<?php

namespace Database\Migrations;

class CreateFirmTable
{
    public static function firmTable($table)
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS {$table}(
                id INT AUTO_INCREMENT PRIMARY KEY,
                /*address VARCHAR(255) NOT NULL,
                phone VARCHAR(255) NOT NULL,
                work_time VARCHAR(255) NOT NULL,
                img VARCHAR(255),*/
                body TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $stm = pdo()->prepare($query);
            $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}