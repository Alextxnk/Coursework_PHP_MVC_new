<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Main;

class DashboardController
{
    // Show how many users and posts we have 
    public function index()
    {
        $main = (new Main)->allMain('main');

        return view('index', ['main' => $main]);
    }
}
