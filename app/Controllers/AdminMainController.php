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

}
