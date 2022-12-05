<?php

namespace App\Models;

use PDO;
use PDOException;

class User
{
    public function makeSession($data, $table)
    {
        // Fetch user data related to inserted email 
        $row = $this->fetchRow($data, $table);

        // If email exists and password matched, start session & login user, else invalid
        if ($row && password_verify($data['password'], $row->password)) {

            sesstionStart();
            sessionUnset('invalid');
            sessionSet('valid', true);
            sessionSet('username', $row->username);
        } else {
            sesstionStart();
            sessionSet('invalid', 'Invalid Credentials.');
        }
    }

    protected function fetchRow($data, $table)
    {
        // Get user query 
        $query = "SELECT * FROM {$table} WHERE email=:email";

        $stm = pdo()->prepare($query);
        $stm->execute(['email' => $data['email']]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    public function storeUser($table, $data)
    {
        // Check if user already exists or not 
        $this->uniqueCheck($table, $data);

        // Register user query 
        $query = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($data)),
            ":" . implode(', :', array_keys($data))
        );

        try {
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        } catch (PDOException $e) {

            $this->jsonEncod(false, $e->getMessage());
        }
    }

    // Get all user 
    public function allUser()
    {
        $select = "SELECT id, username, thumbnail FROM users";

        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Get user by username 
    public function getUser($username)
    {
        $select = "SELECT * FROM users 
                    WHERE username = :username";

        $stm = pdo()->prepare($select);
        $stm->execute(['username' => $username]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Update  user 
    public function updateUser($data)
    {
        $update = "UPDATE users SET 
                    username = :username,
                    email = :email,
                    thumbnail = :thumbnail
                    WHERE id = :id";

        try {
            $stm = pdo()->prepare($update);
            $stm->execute($data);
        } catch (PDOException $e) {

            $this->jsonEncod(false, $e->getMessage());
        }
    }

    // Delete  user 
    public function deleteUser($id)
    {
        $delete = "DELETE FROM users WHERE id = ?";
        $stm = pdo()->prepare($delete);
        $stm->execute([$id]);
    }

    // Count users 
    public function users()
    {
        $select = "SELECT count(*) FROM users";
        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_COLUMN);
    }

    // Check if user already exists or not 
    protected function uniqueCheck($table, $data)
    {
        // Get username, email from table 
        $select = "SELECT username, email FROM {$table}";

        $stm = pdo()->prepare($select);
        $stm->execute();
        $assRows = $stm->fetchAll(PDO::FETCH_ASSOC);

        // Check username, email already exists or not. If yes show invalid
        foreach ($assRows as $rows) {

            if ($rows['username'] == $data['username']) {

                $this->jsonEncod(false, 'Username already exists.');
            } elseif ($rows['email'] == $data['email']) {

                $this->jsonEncod(false, 'Invalid Email.');
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
