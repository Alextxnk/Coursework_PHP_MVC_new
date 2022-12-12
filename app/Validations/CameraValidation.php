<?php

namespace App\Validations;

class CameraValidation
{
    public function validateCamera($values)
    {
        $model = $camera_type = $matrix_resolution = $matrix_type = $max_resolution = $cost = "";

        $model = $this->validateInput($values['model']);
        $camera_type = $this->validateInput($values['camera_type']);
        $matrix_resolution = $this->validateInput($values['matrix_resolution']);
        $matrix_type = $this->validateInput($values['matrix_type']);
        $max_resolution = $this->validateInput($values['max_resolution']);
        $cost = $this->validateInput($values['cost']);

        if (empty($model)) {
            $this->jsonEncod(false, 'Длина модели слишком маленькая.');
        } elseif (empty($camera_type)) {
            $this->jsonEncod(false, 'Длина типа камеры слишком маленькая.');
        } elseif (empty($matrix_resolution)) {
            $this->jsonEncod(false, 'Длина разрешения матрицы слишком маленькая.');
        } elseif (empty($matrix_type)) {
            $this->jsonEncod(false, 'Длина типа матрицы слишком маленькая.');
        } elseif (empty($max_resolution)) {
            $this->jsonEncod(false, 'Длина макс. разрешения слишком маленькая.');
        } elseif (empty($cost)) {
            $this->jsonEncod(false, 'Длина цены слишком маленькая.');
        } else {
            return [
                'model' => $model,
                'camera_type' => $camera_type,
                'matrix_resolution' => $matrix_resolution,
                'matrix_type' => $matrix_type,
                'max_resolution' => $max_resolution,
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