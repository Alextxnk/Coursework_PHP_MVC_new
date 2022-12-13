<?php

namespace App\Models;

use PDO;

class Flash
{
    // Show all flashes
    public function allFlash($table)
    {
        $select = "SELECT * FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Store flash
    public function storeFlash($table, $data)
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

    // Get flash by id
    public function getFlash($id)
    {
        $select = "SELECT id, model, flash_type, cameras, display, zoom, cost, thumbnail FROM flash WHERE id=?";
        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Update flash
    public function updateFlash($data)
    {
        // Update flash query
        $query = "UPDATE flash 
                SET model=:model,
                flash_type=:camera_type,
                cameras=:matrix_resolution,
                display=:matrix_type,
                zoom=:max_resolution,
                cost=:cost,
                thumbnail=:thumbnail
                WHERE id=:id";
        try {
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            $this->jsonEncod(false, $th->getMessage());
        }
    }

    // Delete flash
    public function flashDestroy($id)
    {
        $delete = "DELETE FROM flash WHERE id=?";
        $stm = pdo()->prepare($delete);
        $stm->execute([$id]);
    }

    // Show flash by id
    public function showFlash($id)
    {
        // Single flash query
        $select = "SELECT * FROM flash WHERE id=?";

        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Count flashes
    public function flashes()
    {
        // Get all flashes id query
        $query = "SELECT count(*) FROM flash";

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