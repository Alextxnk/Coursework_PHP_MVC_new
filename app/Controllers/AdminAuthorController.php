<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Author;
use App\Validations\PageValidation;

class AdminAuthorController
{
    // Show admin/author
    public function index()
    {
        $author = ((new Author)->allAuthor('author'));

        /*return dd($author);*/
        return view(
            'admin/author/index',
            [
                'author' => $author,
                'authors' => ((new Author)->authors())
            ]
        );
    }

    // Add admin/author form
    public function create()
    {
        return view('admin/author/create');
    }

    // Show single admin/author
    public function show()
    {
        $author = ((new Author)->showAuthor(Request::values()['id']));

        return view('admin/author/show', ['author' => $author]);
    }

    // Store admin/author
    public function store()
    {
        // Validate admin/author
        $data = (new PageValidation)
            ->validatePage(Request::values());

        // Send to store
        (new Author)->storeAuthor('author', $data);

        // Success message
        echo json_encode([
            'success'   => true,
            'message'   => 'Автор добавлен успешно!'
        ]);

        //redirect('admin/author');
    }

    // Edit admin/author
    public function edit()
    {
        $author = (new Author)->getAuthor(
            Request::values()['id']
        );
        //dd($author);
        return view('admin/author/edit', ['author' => $author]);
    }

    // Update admin/author
    public function update()
    {
        // Validate admin/author
        $data = (new PageValidation)
            ->validatePage(Request::values());
        // Push id
        $data['id'] = Request::values()['id'];

        (new Author)->updateAuthor($data);

        // Success message
        echo json_encode([
            'success' => true,
            'message' => 'Автор обновлен успешно!'
        ]);

        //redirect('admin/author');
    }

    // Delete admin/author
    public function destroy()
    {
        (new Author)->authorDestroy(Request::values()['id']);

        redirect('admin/author');
    }
}
