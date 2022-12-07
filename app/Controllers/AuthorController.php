<?php

namespace App\Controllers;
use App\Models\Author;

class AuthorController
{
    // Show how many users and posts we have
    public function index()
    {
        $author = (new Author)->allAuthor('author');

        return view('author/index', ['author' => $author]);
    }
}
