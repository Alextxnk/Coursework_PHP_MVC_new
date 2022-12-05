<?php

namespace App\Validations;

class AuthorValidation
{
    public function validateAuthor($values)
    {
        $title = '';

        $title = $this->validateInput($values['title']);
        $title = strtolower($title);

        if (empty($title)) {
            $this->jsonEncod(false, 'Title length is too short.');
        } else {
            return [
                'title' => $title
            ];
        }
    }

    private function validateInput($value)
    {
        $data = htmlspecialchars($value);
        $data = trim($value);
        $data = stripslashes($value);
        return $data;
    }

    private function jsonEncod($success, $message)
    {
        echo json_encode([
            'success'   => $success,
            'message'   => $message
        ]);
        exit();
    }
}
