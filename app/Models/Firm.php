<?php

namespace App\Models;

use PDO;

class Firm
{
    // Show all firms
    public function allFirm($table)
    {
        $select = "SELECT * FROM {$table}";
        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Store firm
    public function storeFirm($table, $data)
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

    // Get firm by id
    public function getFirm($id)
    {
        $select = "SELECT id, /*address, phone, work_time, img,*/ body FROM firm WHERE id=?";
        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Update firm
    public function updateFirm($data)
    {
        // Update firm query
        $query = "UPDATE firm 
                SET /*address=:address,
                phone=:phone,
                work_time=:work_time,*/
                body=:body
                WHERE id=:id";
        try {
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            $this->jsonEncod(false, $th->getMessage());
        }
    }

    // Delete firm
    public function firmDestroy($id)
    {
        $delete = "DELETE FROM firm WHERE id=?";
        $stm = pdo()->prepare($delete);
        $stm->execute([$id]);
    }

    // Show firm by id
    public function showFirm($id)
    {
        // Single firm query
        $select = "SELECT * FROM firm WHERE id=?";

        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Count firms
    public function firms()
    {
        // Get all firms id query
        $query = "SELECT count(*) FROM firm";

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
