<?php

namespace App\Controllers;

class AuthorController
{
    // Show how many users and posts we have
    public function index()
    {
        return view('author/index');
    }
}
