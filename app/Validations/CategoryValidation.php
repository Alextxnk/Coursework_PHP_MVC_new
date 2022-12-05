<?php

namespace App\Validations;

class CategoryValidation
{
    public function validateCategory($values)
    {
        $name = '';

        $name = $this->validateInput($values['name']);
        $name = strtolower($name);

        if (empty($name)) {
            $this->jsonEncod(false, 'Name length is too short.');
        } else {
            return [
                'name' => $name
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
