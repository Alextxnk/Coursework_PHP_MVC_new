<?php

namespace App\Models;

use PDO;

class Category
{
    // Show all categories 
    public function allCategory($table)
    {
        $select = "SELECT * FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Store category 
    public function storeCategory($table, $data)
    {
        $this->uniqueCheck($table, $data);

        try {
            $query = sprintf(
                "INSERT INTO %s (%s) VALUES(%s)",
                $table,
                implode(', ', array_keys($data)),
                ":" . implode(',', array_keys($data))
            );
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            $this->jsonEncod(false, $th->getMessage());
        }
    }

    // Get category by id 
    public function getCategory($id)
    {
        $select = "SELECT id, name FROM categories WHERE id=?";
        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Update category 
    public function updateCategory($data)
    {
        // Update category query 
        $query = "UPDATE categories 
                SET name=:name 
                WHERE id=:id";
        try {
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            $this->jsonEncod(false, $th->getMessage());
        }
    }

    // Delete category 
    public function categoryDestroy($id)
    {
        $delete = "DELETE FROM categories WHERE id=?";
        $stm = pdo()->prepare($delete);
        $stm->execute([$id]);
    }

    // Check if category already exists or not 
    protected function uniqueCheck($table, $data)
    {
        $select = "SELECT name FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        $asRows = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach ($asRows as $rows) {
            if ($rows['name'] == $data['name']) {
                $this->jsonEncod(false, 'Category already exists!');
            }
        }
    }

    protected function jsonEncod($success, $message)
    {
        echo json_encode([
            'success'   => $success,
            'message'   => $message
        ]);
        exit();
    }
}
