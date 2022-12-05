<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;

class DashboardController
{
    // Show how many users and posts we have 
    public function index()
    {
        return view(
            'index',
            [
                'users' => ((new User)->users()),
                'posts' => ((new Post)->posts())
            ]
        );
    }
}
