<?php

namespace App\Validations;

class ImageValidation
{
    public function imgValidation($img)
    {
        // Check if image uploaded or not 
        if (!empty($img['name'])) {
            if (is_uploaded_file($img['tmp_name'])) {
                return $this->validateImg($img);
            } else {
                $this->jsonEncod(false, 'Something went wrong.');
            }
        }
    }

    protected function validateImg($img)
    {
        // Accepted Image type 
        $allowedTypes = [
            'image/png' => 'png',
            'image/jpeg' => 'jpg'
        ];

        $filepath = $img['tmp_name'];
        $fileSize = filesize($filepath);
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
        $filetype = finfo_file($fileinfo, $filepath);

        // Check image type, if not matched show error else upload image and return url to insert into DB
        if (!in_array($filetype, array_keys($allowedTypes))) {

            $this->jsonEncod(false, 'File not allowed.');
        } elseif ($fileSize > 5242880) { // 5 MB MAX, 5 MB (1 byte * 1024 * 1024 * 5 (for 5 MB))

            $this->jsonEncod(false, 'Максимальный размер файла 5МБ');
        } else {

            $subDirectory = $this->makeDir();
            $imgName = strtolower(str_replace(' ', '-', $img['name']));
            $imgUrl  = $subDirectory . '/' . $imgName;
            move_uploaded_file($filepath, $imgUrl);
            return 'public/assets/thumbnails/' . $imgName;
        }
    }

    protected function makeDir()
    {
        // Parent and child directory 
        $parentDirectory = publicDir() . 'assets';
        return $subDirectory = publicDir() . 'assets/' . 'thumbnails';
        // If parent and child directory not exists make it
        if (!is_dir($parentDirectory) && $parentDirectory != '') {
            mkdir($parentDirectory);
        }
        if (!is_dir($subDirectory) && $subDirectory != '') {
            mkdir($subDirectory);
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
