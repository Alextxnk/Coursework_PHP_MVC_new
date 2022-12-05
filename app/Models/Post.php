<?php

namespace App\Models;

use PDO;
use PDOException;

class Post
{
    public function storePost($table, $data)
    {
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

    // Insert data to category_post table 
    public function sendToStoreCatPost($category_ids, $lastPostId)
    {
        foreach ($category_ids as $category_id) {
            $data = [
                "category_id" => $category_id,
                "post_id" => $lastPostId,
            ];

            $query = sprintf(
                "INSERT INTO %s (%s) VALUES(%s)",
                "category_post",
                implode(', ', array_keys($data)),
                ":" . implode(', :', array_keys($data))
            );
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        }
    }

    public function deleteCatPost($category_id, $postId)
    {
        try {
            $delete = "DELETE FROM category_post WHERE post_id = ?";

            $stm = pdo()->prepare($delete);
            $stm->execute([$postId]);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function sendToUpdateCatPost($category_ids, $postId)
    {
        foreach ($category_ids as $category_id) {
            $data = [
                "category_id" => $category_id,
                "post_id" => $postId,
            ];

            $update = "UPDATE category_post 
            SET category_id=:category_id 
            WHERE post_id=:post_id";

            $stm = pdo()->prepare($update);
            $stm->execute($data);
        }
    }

    // Check if title and slug exists or not 
    protected function uniqueCheck($table, $data)
    {
        $select = "SELECT title, slug FROM {$table}";

        $stm = pdo()->prepare($select);
        $stm->execute();
        $asRows = $stm->fetchAll(PDO::FETCH_ASSOC);

        // Check unique title and slug, if exist show message
        foreach ($asRows as $rows) {

            if ($rows['title'] == $data['title']) {

                $this->jsonEncod(false, 'Title already exists.');
            } elseif ($rows['slug'] == $data['slug']) {

                $this->jsonEncod(false, 'Slug already exists.');
            }
        }
    }

    // Get categories related to post id 
    public function getCategories($id)
    {
        $select = "SELECT category_id FROM category_post WHERE post_id = ?";

        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetchAll(PDO::FETCH_COLUMN);
    }

    // Update post 
    public function updatePost($table, $data)
    {
        // Update post query 
        $query = "UPDATE {$table} 
                SET title=:title, 
                slug=:slug, 
                user_id=:user_id,
                body=:body, 
                thumbnail=ifnull(:thumbnail, thumbnail) 
                WHERE id=:id";

        try {
            $stm = pdo()->prepare($query);
            $stm->execute($data);
        } catch (PDOException $e) {

            $this->jsonEncod(false, $e->getMessage());
        }
    }

    // Delete post 
    public function deletePost($table, $id)
    {
        // Delete post query 
        $query = "DELETE FROM {$table} WHERE id=?";

        try {
            $stm = pdo()->prepare($query);
            $stm->execute([$id]);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    // Show post by id 
    public function showPost($id)
    {
        // Single post query 
        $select = "SELECT * FROM posts WHERE id=?";

        $stm = pdo()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    // Get posts 
    public function getPosts($table)
    {
        // Get all posts query 
        $select = "SELECT * FROM {$table}";

        $stm = pdo()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Count posts 
    public function posts()
    {
        // Get all posts id query 
        $query = "SELECT count(*) FROM posts";

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
