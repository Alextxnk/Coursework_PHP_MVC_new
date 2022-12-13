<?php

namespace App\Controllers;
use App\Models\Camera;
use App\Core\Request;

class CameraController
{
    public function index()
    {
        $camera = (new Camera)->allCamera('camera');

        return view('camera/index', ['camera' => $camera]);
    }

    // Show single camera/card
    public function show()
    {
        $camera = ((new Camera)->showCamera(Request::values()['id']));

        return view('camera/card/index', ['camera' => $camera]);
    }
}
