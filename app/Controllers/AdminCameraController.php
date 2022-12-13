<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Camera;
use App\Validations\CameraValidation;
use App\Validations\ImageValidation;

class AdminCameraController
{
    // Show admin/camera
    public function index()
    {
        $camera= ((new Camera)->allCamera('camera'));

        return view(
            'admin/camera/index',
            [
                'camera' => $camera,
                'cameras' => ((new Camera)->cameras())
            ]
        );
    }

    // Add admin/camera form
    public function create()
    {
        return view('admin/camera/create');
    }

    // Show single admin/camera
    public function show()
    {
        $camera = ((new Camera)->showCamera(Request::values()['id']));

        return view('admin/camera/show', ['camera' => $camera]);
    }

    // Store admin/camera
    public function store()
    {
        // Validate admin/camera
        $data = ((new CameraValidation)->validateCamera(Request::values()));

        // Validate thumbnail
        $imgUrl = '';
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        if ($imgUrl) $imgUrl = $imgUrl;

        // Success message
        echo json_encode([
            'success'   => true,
            'message'   => 'Камера добавлена успешно!'
        ]);

        if ($imgUrl == '') {
            $data['thumbnail'] = 'public/assets/thumbnails/800x400.png';
            return ((new Camera)->storeCamera('camera', $data));
        } else {
            $data['thumbnail'] = $imgUrl;
            return ((new Camera)->storeCamera('camera', $data));
        }
    }

    // Edit admin/camera
    public function edit()
    {
        $camera = (new Camera)->getCamera(
            Request::values()['id']
        );

        return view('admin/camera/edit', ['camera' => $camera]);
    }

    // Update admin/camera
    public function update()
    {
        // Validate admin/camera
        $data = ((new CameraValidation)->validateCamera(Request::values()));
        // Push id
        $data['id'] = Request::values()['id'];

        // Validate thumbnail
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        $data['thumbnail'] = $imgUrl;

        (new Camera)->updateCamera($data);

        // Success message
        echo json_encode([
            'success' => true,
            'message' => 'Камера обновлена успешно!'
        ]);
    }

    // Delete admin/camera
    public function destroy()
    {
        (new Camera)->cameraDestroy(Request::values()['id']);

        redirect('admin/camera');
    }

}