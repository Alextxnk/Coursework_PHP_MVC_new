<?php

namespace App\Controllers;
use App\Models\Flash;
use App\Core\Request;

class FlashController
{
    public function index()
    {
        $flash = (new Flash)->allFlash('flash');

        return view('flash/index', ['flash' => $flash]);
    }

    // Show single flash/card
    public function show()
    {
        $flash = ((new Flash)->showFlash(Request::values()['id']));

        return view('flash/card/index', ['flash' => $flash]);
    }
}
