<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\User;
use App\Validations\ImageValidation;
use App\Validations\UserValidation;

class UserController
{
    // Show users 
    public function index()
    {
        $users = (new User)->allUser();

        return view('users/index', ['users' => $users]);
    }

    // Edit user 
    public function edit()
    {
        $user = (new User)->getUser(Request::values()['username']);
        return view('users/edit', ['user' => $user]);
    }

    // Update user 
    public function update()
    {
        // Vlidate user 
        $data = (new UserValidation)->validateUpdateUser(Request::values());
        // Push id 
        $data['id'] = Request::values()['id'];

        // Vlidate thumbnail
        $imgUrl = '';
        $imgUrl = (new ImageValidation)->imgValidation(Request::file()['thumbnail']);
        if ($imgUrl) $imgUrl = $imgUrl;

        // Process to store 
        $this->processToStore($imgUrl, $data);

        // Success message 
        echo json_encode([
            'success'   => true,
            'message'   => 'User updated successfully.'
        ]);
    }

    // Delete user 
    public function destroy()
    {
        $id = Request::values()['id'];
        (new User)->deleteUser($id);

        redirect('users');
    }

    protected function processToStore($imgUrl, $data)
    {
        if ($imgUrl == '') {
            // If no thumbnail, insert an image 
            $data['thumbnail'] = 'public/assets/thumbnails/800x400.png';
            ((new User)->updateUser($data));
        } else {
            $data['thumbnail'] = $imgUrl;
            ((new User)->updateUser($data));
        }
    }
}
