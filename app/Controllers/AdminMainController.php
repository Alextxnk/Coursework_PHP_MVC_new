<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Main;
use App\Validations\PageValidation;

class AdminMainController
{
    // Show admin/main
    public function index()
    {
        $main = ((new Main)->allMain('main'));

        return view(
            'admin/main/index',
            [
                'main' => $main,
                'mains' => ((new Main)->mains())
            ]
        );
    }

    // Add admin/main form
    public function create()
    {
        return view('admin/main/create');
    }

    // Show single admin/main
    public function show()
    {
        $main = ((new Main)->showMain(Request::values()['id']));

        return view('admin/main/show', ['main' => $main]);
    }

    // Store admin/main
    public function store()
    {
        // Validate admin/main
        $data = (new PageValidation)
            ->validatePage(Request::values());

        // Send to store
        (new Main)->storeMain('main', $data);

        // Success message
        echo json_encode([
            'success'   => true,
            'message'   => 'Главная страница добавлена успешно!'
        ]);
    }

    // Edit admin/main
    public function edit()
    {
        $main = (new Main)->getMain(
            Request::values()['id']
        );

        return view('admin/main/edit', ['main' => $main]);
    }

    // Update admin/main
    public function update()
    {
        // Validate admin/main
        $data = (new PageValidation)
            ->validatePage(Request::values());
        // Push id
        $data['id'] = Request::values()['id'];

        (new Main)->updateMain($data);

        // Success message
        echo json_encode([
            'success' => true,
            'message' => 'Главная страница обновлена успешно!'
        ]);
    }

    // Delete admin/main
    public function destroy()
    {
        (new Main)->mainDestroy(Request::values()['id']);

        redirect('admin/main');
    }
}
