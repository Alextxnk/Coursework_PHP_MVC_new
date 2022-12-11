<?php

namespace App\Validations;

class AuthorValidation
{
    public function validateAuthor($values)
    {
        $title = $body = "";

        $title = $this->validateInput($values['title']);
        $body = $this->validateInput($values['body']);

        if (empty($title)) {
            $this->jsonEncod(false, 'Длина заголовка слишком маленькая.');
        } elseif (empty($body)) {
            $this->jsonEncod(false, 'Длина секции слишком маленькая.');
        } else {
            return [
                'title' => $title,
                'body' => $body,
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
