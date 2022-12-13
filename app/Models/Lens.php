<?php

namespace App\Models;

use PDO;

class Lens
{
    // Show all lenses
    public function allLenses($table)
    {
        $select = "SELECT * FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Store lens
    public function storeLens($table, $data)
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

    // Get lens by id
    public function getLens($id)
    {
        $select = "SELECT id, model, lens_type, min_distance, max_distance, cost, thumbnail FROM lens WHERE id=?";
        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Update lens
    public function updateLens($data)
    {
        // Update lens query
        $query = "UPDATE lens 
                SET model=:model,
                lens_type=:lens_type,
                min_distance=:min_distance,
                max_distance=:max_distance,
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

    // Delete lens
    public function lensDestroy($id)
    {
        $delete = "DELETE FROM lens WHERE id=?";
        $stm = pdo()->prepare($delete);
        $stm->execute([$id]);
    }

    // Show lens by id
    public function showLens($id)
    {
        // Single lens query
        $select = "SELECT * FROM lens WHERE id=?";

        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Count lenses
    public function lenses()
    {
        // Get all lenses id query
        $query = "SELECT count(*) FROM lens";

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