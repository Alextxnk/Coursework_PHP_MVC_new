<?php

namespace App\Models;

use PDO;

class Camera
{
    // Show all cameras
    public function allCamera($table)
    {
        $select = "SELECT * FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Store camera
    public function storeCamera($table, $data)
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

    // Get camera by id
    public function getCamera($id)
    {
        $select = "SELECT id, model, camera_type, matrix_resolution, matrix_type, max_resolution, cost, thumbnail FROM camera WHERE id=?";
        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Update camera
    public function updateCamera($data)
    {
        // Update camera query
        $query = "UPDATE camera 
                SET model=:model,
                camera_type=:camera_type,
                matrix_resolution=:matrix_resolution,
                matrix_type=:matrix_type,
                max_resolution=:max_resolution,
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

    // Delete camera
    public function cameraDestroy($id)
    {
        $delete = "DELETE FROM camera WHERE id=?";
        $stm = pdo()->prepare($delete);
        $stm->execute([$id]);
    }

    // Show camera by id
    public function showCamera($id)
    {
        // Single camera query
        $select = "SELECT * FROM camera WHERE id=?";

        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Count cameras
    public function cameras()
    {
        // Get all cameras id query
        $query = "SELECT count(*) FROM camera";

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