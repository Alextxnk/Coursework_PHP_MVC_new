<?php

namespace Database\Migrations;

class CreateAuthorTable
{
    public static function authorTable($table)
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS {$table}(
                id INT AUTO_INCREMENT PRIMARY KEY,
                /*title VARCHAR(255) NULL UNIQUE,*/
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
