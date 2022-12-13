<?php

namespace App\Validations;

class FLashValidation
{
    public function validateFLash($values)
    {
        $model = $flash_type = $cameras = $display = $zoom = $cost = "";

        $model = $this->validateInput($values['model']);
        $flash_type = $this->validateInput($values['flash_type']);
        $cameras = $this->validateInput($values['cameras']);
        $display = $this->validateInput($values['display']);
        $zoom = $this->validateInput($values['zoom']);
        $cost = $this->validateInput($values['cost']);

        if (empty($model)) {
            $this->jsonEncod(false, 'Длина модели слишком маленькая.');
        } elseif (empty($flash_type)) {
            $this->jsonEncod(false, 'Длина типа вспышки слишком маленькая.');
        } elseif (empty($cameras)) {
            $this->jsonEncod(false, 'Длина совместимой камеры слишком маленькая.');
        } elseif (empty($display)) {
            $this->jsonEncod(false, 'Длина дисплея слишком маленькая.');
        } elseif (empty($zoom)) {
            $this->jsonEncod(false, 'Длина зума слишком маленькая.');
        } elseif (empty($cost)) {
            $this->jsonEncod(false, 'Длина цены слишком маленькая.');
        } else {
            return [
                'model' => $model,
                'flash_type' => $flash_type,
                'cameras' => $cameras,
                'display' => $display,
                'zoom' => $zoom,
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