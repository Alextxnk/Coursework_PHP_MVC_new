<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Lens;
use App\Validations\LensValidation;
use App\Validations\ImageValidation;

class AdminLensController {
    // Show admin/lens
    public function index()
    {
        $lens= ((new Lens)->allLenses('lens'));

        return view(
            'admin/lens/index',
            [
                'lens' => $lens,
                'lenses' => ((new Lens)->lenses())
            ]
        );
    }

    // Add admin/lens form
    public function create()
    {
        return view('admin/lens/create');
    }

    // Show single admin/lens
    public function show()
    {
        $lens = ((new Lens)->showLens(Request::values()['id']));

        return view('admin/lens/show', ['lens' => $lens]);
    }

    // Store admin/lens
    public function store()
    {
        // Validate admin/lens
        $data = ((new LensValidation)->validateLens(Request::values()));

        // Validate thumbnail
        $imgUrl = '';
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        if ($imgUrl) $imgUrl = $imgUrl;

        // Success message
        echo json_encode([
            'success'   => true,
            'message'   => 'Объектив добавлен успешно!'
        ]);

        if ($imgUrl == '') {
            $data['thumbnail'] = 'public/assets/thumbnails/800x400.png';
            return ((new Lens)->storeLens('lens', $data));
        } else {
            $data['thumbnail'] = $imgUrl;
            return ((new Lens)->storeLens('lens', $data));
        }
    }

    // Edit admin/lens
    public function edit()
    {
        $lens = (new Lens)->getLens(
            Request::values()['id']
        );

        return view('admin/lens/edit', ['lens' => $lens]);
    }

    // Update admin/lens
    public function update()
    {
        // Validate admin/lens
        $data = ((new LensValidation)->validateLens(Request::values()));
        // Push id
        $data['id'] = Request::values()['id'];

        // Validate thumbnail
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        $data['thumbnail'] = $imgUrl;

        (new Lens)->updateLens($data);

        // Success message
        echo json_encode([
            'success' => true,
            'message' => 'Объектив обновлен успешно!'
        ]);
    }

    // Delete admin/lens
    public function destroy()
    {
        (new Lens)->lensDestroy(Request::values()['id']);

        redirect('admin/lens');
    }
}