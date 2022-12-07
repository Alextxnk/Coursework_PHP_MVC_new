<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Author;
use App\Validations\ImageValidation;
use App\Validations\UserValidation;

class AdminController
{
    public function index()
    {
        return view(
            'admin/index',
            [
                'users' => ((new User)->users()),
                'posts' => ((new Post)->posts()),
                'authors' => ((new Author)->authors())
            ]
        );
    }
    // Register view 
    public function create()
    {
        return view('admin/register');
    }

    // Login view 
    public function login()
    {
        return view('admin/login');
    }

    // User login 
    public function session()
    {
        ((new User)->makeSession(Request::values(), 'users'));
        redirect('admin');
    }

    // User log-out 
    public function destroy()
    {
        session_start();
        sessionUnset('valid');
        sessionUnset('username');

        redirect('admin/login');
    }

    // Register user 
    public function store()
    {
        // Validate user 
        $data = ((new UserValidation)->validateUser(Request::values()));

        // Validate thumbnail
        $imgUrl = '';
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        if ($imgUrl) $imgUrl = $imgUrl;
        $data['thumbnail'] = $imgUrl;

        // Send user data to user model to store
        ((new User)->storeUser('users', $data));

        // Success message
        echo json_encode([
            'success'   => true,
            'message'   => 'Registered successfully.'
        ]);
    }
}
