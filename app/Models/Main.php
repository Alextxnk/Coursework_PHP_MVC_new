<?php

namespace App\Models;

use PDO;

class Main
{
    // Show all mains
    public function allMain($table)
    {
        $select = "SELECT * FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Store main
    public function storeMain($table, $data)
    {
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

    // Get main by id
    public function getMain($id)
    {
        $select = "SELECT id, body FROM main WHERE id=?";
        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Update main
    public function updateMain($data)
    {
        // Update main query
        $query = "UPDATE main 
                SET body=:body
                WHERE id=:id";
        try {
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            $this->jsonEncod(false, $th->getMessage());
        }
    }

    // Delete main
    public function mainDestroy($id)
    {
        $delete = "DELETE FROM main WHERE id=?";
        $stm = pdo()->prepare($delete);
        $stm->execute([$id]);
    }

    // Show main by id
    public function showMain($id)
    {
        // Single main query
        $select = "SELECT * FROM main WHERE id=?";

        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Count mains
    public function mains()
    {
        // Get all mains id query
        $query = "SELECT count(*) FROM main";

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
