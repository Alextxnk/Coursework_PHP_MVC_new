<?php

namespace Database\Migrations;

class CreateCategoryPostTable
{
    public static function categoryPostTable($table)
    {
        $query = "CREATE TABLE IF NOT EXISTS {$table}(
            id INT AUTO_INCREMENT PRIMARY KEY,
            category_id INT NOT NULL,
            post_id INT NOT NULL,
            UNIQUE(category_id, post_id),
            FOREIGN KEY (category_id) REFERENCES categories (id)
                ON DELETE CASCADE,
            FOREIGN KEY (post_id) REFERENCES posts (id)
                ON DELETE CASCADE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $stm = pdo()->prepare($query);
        $stm->execute();
    }
}
