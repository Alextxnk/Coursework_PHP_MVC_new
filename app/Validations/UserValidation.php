<?php

namespace App\Validations;

class UserValidation
{
    public function validateUser($values)
    {
        // define variables and set to empty values
        $username = $email = $password = "";

        // Validate user 
        $username = $this->validate_input($values['username']);
        $email = $this->validate_input($values['email']);
        $password = $values['password'];
        $hashed_password = password_hash($values['password'], PASSWORD_DEFAULT);

        if (empty($username)) {

            $this->jsonEncod(false, 'Username length is too short.');
        } elseif (empty($email)) {

            $this->jsonEncod(false, 'Email length is too short.');
        } elseif (empty($password)) {

            $this->jsonEncod(false, 'Password length is too short.');
        } elseif (!preg_match("/^[A-Za-z0-9_ -]+$/", $username)) {

            $this->jsonEncod(false, 'Username should be a-z or 0-9 only.');
        } elseif (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {

            $this->jsonEncod(false, 'Invalid Email.');
        } elseif (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {

            $this->jsonEncod(false, 'Password min 5 & upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character.');
        } else {
            return [
                'username' => $username,
                'email' => $email,
                'password' => $hashed_password,
            ];
        }
    }

    public function validateUpdateUser($values)
    {
        $username = $email = '';

        $username = $this->validate_input($values['username']);
        $email = $this->validate_input($values['email']);

        if (empty($username)) {
            $this->jsonEncod(false, 'Username length is too short.');
        } elseif (empty($email)) {

            $this->jsonEncod(false, 'Email length is too short.');
        } elseif (!preg_match("/^[A-Za-z0-9_ -]+$/", $username)) {

            $this->jsonEncod(false, 'Username should be a-z or 0-9 only.');
        } elseif (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {

            $this->jsonEncod(false, 'Invalid Email.');
        } else {
            return [
                'username' => $username,
                'email' => $email
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
