<?php

namespace App\Validations;

class LensValidation
{
    public function validateLens($values)
    {
        $model = $lens_type = $min_distance = $max_distance = $cost = "";

        $model = $this->validateInput($values['model']);
        $lens_type = $this->validateInput($values['lens_type']);
        $min_distance = $this->validateInput($values['min_distance']);
        $max_distance= $this->validateInput($values['max_distance']);
        $cost = $this->validateInput($values['cost']);

        if (empty($model)) {
            $this->jsonEncod(false, 'Длина модели слишком маленькая.');
        } elseif (empty($lens_type)) {
            $this->jsonEncod(false, 'Длина типа объектива слишком маленькая.');
        } elseif (empty($min_distance)) {
            $this->jsonEncod(false, 'Длина мин. расст. слишком маленькая.');
        } elseif (empty($max_distance)) {
            $this->jsonEncod(false, 'Длина макс. расст. слишком маленькая.');
        } elseif (empty($cost)) {
            $this->jsonEncod(false, 'Длина цены слишком маленькая.');
        } else {
            return [
                'model' => $model,
                'lens_type' => $lens_type,
                'min_distance' => $min_distance,
                'max_distance' => $max_distance,
                'cost' => $cost
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