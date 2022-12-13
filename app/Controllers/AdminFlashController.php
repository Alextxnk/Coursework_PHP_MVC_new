<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Flash;
use App\Validations\FLashValidation;
use App\Validations\ImageValidation;

class AdminFlashController
{
    // Show admin/flash
    public function index()
    {
        $flash = ((new Flash)->allFlash('flash'));

        return view(
            'admin/flash/index',
            [
                'flash' => $flash,
                'flashes' => ((new Flash)->flashes())
            ]
        );
    }

    // Add admin/flash form
    public function create()
    {
        return view('admin/flash/create');
    }

    // Show single admin/flash
    public function show()
    {
        $flash = ((new Flash)->showFlash(Request::values()['id']));

        return view('admin/flash/show', ['flash' => $flash]);
    }

    // Store admin/flash
    public function store()
    {
        // Validate admin/flash
        $data = ((new FLashValidation)->validateFLash(Request::values()));

        // Validate thumbnail
        $imgUrl = '';
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        if ($imgUrl) $imgUrl = $imgUrl;

        // Success message
        echo json_encode([
            'success'   => true,
            'message'   => 'Вспышка добавлена успешно!'
        ]);

        if ($imgUrl == '') {
            $data['thumbnail'] = 'public/assets/thumbnails/800x400.png';
            return ((new Flash)->storeFlash('flash', $data));
        } else {
            $data['thumbnail'] = $imgUrl;
            return ((new Flash)->storeFlash('flash', $data));
        }
    }

    // Edit admin/flash
    public function edit()
    {
        $flash = (new Flash)->getFlash(
            Request::values()['id']
        );

        return view('admin/flash/edit', ['flash' => $flash]);
    }

    // Update admin/flash
    public function update()
    {
        // Validate admin/flash
        $data = ((new FLashValidation)->validateFLash(Request::values()));
        // Push id
        $data['id'] = Request::values()['id'];

        // Validate thumbnail
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        $data['thumbnail'] = $imgUrl;

        (new Flash)->updateFlash($data);

        // Success message
        echo json_encode([
            'success' => true,
            'message' => 'Вспышка обновлена успешно!'
        ]);
    }

    // Delete admin/flash
    public function destroy()
    {
        (new Flash)->flashDestroy(Request::values()['id']);

        redirect('admin/flash');
    }
}
