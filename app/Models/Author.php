<?php

namespace App\Models;

use PDO;

class Author
{
    // Show all authors
    public function allAuthor($table)
    {
        $select = "SELECT * FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Store author
    public function storeAuthor($table, $data)
    {
        /*$this->uniqueCheck($table, $data);

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
        }*/

        // Check post unique value
        $this->uniqueCheck($table, $data);

        // Insert post query
        $query = sprintf(
            "INSERT INTO %s (%s) VALUES(%s)",
            $table,
            implode(', ', array_keys($data)),
            ":" . implode(', :', array_keys($data))
        );

        try {
            $pdo = pdo();
            $stm = $pdo->prepare($query);
            $stm->execute($data);
            return $pdo->lastInsertId();
        } catch (PDOException $e) {

            $this->jsonEncod(false, $e->getMessage());
        }
    }

    // Get author by id
    public function getAuthor($id)
    {
        $select = "SELECT id, title, body FROM author WHERE id=?";
        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Update author
    public function updateAuthor($data)
    {
        // Update author query
        $query = "UPDATE author 
                    SET title=:title,
                    body=:body
                    WHERE id=:id";
        try {
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            $this->jsonEncod(false, $th->getMessage());
        }
    }

    // Delete author
    public function authorDestroy($id)
    {
        $delete = "DELETE FROM author WHERE id=?";
        $stm = pdo()->prepare($delete);
        $stm->execute([$id]);
    }

    // Show author by id
    public function showAuthor($id)
    {
        // Single author query
        $select = "SELECT * FROM author WHERE id=?";

        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Check if author already exists or not
    protected function uniqueCheck($table, $data)
    {
        $select = "SELECT title FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        $asRows = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach ($asRows as $rows) {
            if ($rows['title'] == $data['title']) {
                $this->jsonEncod(false, 'Такая запись автора уже существует!');
            }
        }
    }

    // Count posts
    public function authors()
    {
        // Get all posts id query
        $query = "SELECT count(*) FROM author";

        $stm = pdo()->prepare($query);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_COLUMN);
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
