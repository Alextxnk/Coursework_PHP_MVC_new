<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Author;
use App\Validations\AuthorValidation;

class AdminAuthorController
{
    // Show admin/author
    public function index()
    {
        $author = (new Author)->allAuthor('author');

        /*return dd($authors);*/
        return view('admin/author/index', ['author' => $author]);
    }

    // Add admin/author form
    public function create()
    {
        return view('admin/author/create');
    }

    // Store admin/author
    public function store()
    {
        // Validate admin/author
        $data = (new AuthorValidation)
            ->validateAuthor(Request::values());

        // Send to store
        (new Author)->storeAuthor('author', $data);

        // Success message
        echo json_encode([
            'success'   => true,
            'message'   => 'Author added successfully.'
        ]);
    }

    // Edit admin/author
    public function edit()
    {
        $author = (new Author)->getAuthor(
            Request::values()['id']
        );

        return view('admin/author/edit', ['author' => $author]);
    }

    // Update admin/author
    public function update()
    {
        // Validate admin/author
        $data = (new AuthorValidation)
            ->validateAuthor(Request::values());
        // Push id
        $data['id'] = Request::values()['id'];

        (new Author)->updateAuthor($data);

        // Success message
        echo json_encode([
            'success' => true,
            'message' => 'Author updated successfully!'
        ]);
    }

    // Delete admin/author
    public function destroy()
    {
        (new Author)->authorDestroy(Request::values()['id']);

        redirect('admin/author');
    }
}
