<?php

namespace App\Validations;

class PostValidation
{
    public function validatePost($values)
    {
        // define variables and set to empty values
        $title = $slug = $body = "";

        // Validate inputs 
        $title = $this->validate_input($values['title']);
        $slug = $this->validate_input($values['slug']);
        $body = $this->validate_input($values['body']);

        $slug = strtolower(str_replace(' ', '-', $slug));

        if (empty($title)) {

            $this->jsonEncod(false, 'Title length is too short.');
        } elseif (empty($slug)) {

            $this->jsonEncod(false, 'Slug length is too short.');
        } elseif (empty($body)) {
            $this->jsonEncod(false, 'Body length is too short.');
        } else {
            return [
                'title' => $title,
                'slug' => $slug,
                'body' => $body
            ];
        }
    }

    protected function validate_input($data)
    {
        // Validation rules 
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
