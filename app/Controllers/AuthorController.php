<?php

namespace App\Controllers;
use App\Models\Author;

class AuthorController
{
    public function index()
    {
        $author = (new Author)->allAuthor('author');

        return view('author/index', ['author' => $author]);
    }
}
