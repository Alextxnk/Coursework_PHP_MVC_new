<?php

namespace App\Validations;

class PageValidation
{
    public function validatePage($values)
    {
        $body = "";

        $body = $this->validateInput($values['body']);

        if (empty($body)) {
            $this->jsonEncod(false, 'Длина секции слишком маленькая.');
        } else {
            return [
                'body' => $body
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